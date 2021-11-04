<?php

use JetBrains\PhpStorm\Pure;

class PostLoader
{
    private int $numberOfEntries = 20;

    private array $results;

    private EmojiModifier $emojiModifier;


    #[Pure] public function __construct(){
        $this->emojiModifier = new EmojiModifier();
    }

    /**
     * @throws JsonException
     */
    public function gimmeEntries() {
        return json_decode(file_get_contents("entries.json"), true, 512, JSON_THROW_ON_ERROR);
    }

    /**
     * @throws JsonException
     */
    public function putEmBack($entries): void
    {
        file_put_contents("entries.json", json_encode($entries, JSON_THROW_ON_ERROR));
    }

    /**
     * @param int $numberOfEntries
     */
    public function setNumberOfEntries(int $numberOfEntries): void
    {
        $this->numberOfEntries = $numberOfEntries;
    }

    public function headingWrap ($param, $headingLevel) : string {
        return "<h" . $headingLevel . ">" . $param . "</h" . $headingLevel . ">";
    }

    public function contentWrap ($param) : string {
        return "<p>" . $param . "</p>";
    }

    /**
     * @throws JsonException
     */
    public function displayPosts(): array {
        foreach (array_slice($this->gimmeEntries(), 0, $this->numberOfEntries) as $entry) {
            $this->results[] = "<div>" . $this->emojiModifier->replace($this->headingWrap($entry["title"], 1)) .
            $this->headingWrap(substr($entry["date"]["date"], 0, -16), 3) .
            $this->emojiModifier->replace($this->contentWrap($entry["content"])) .
            $this->emojiModifier->replace($this->headingWrap($entry["author"], 2)) . "<br></div>";
        }
        return $this->results;
    }
}