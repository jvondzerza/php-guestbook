<?php

class Post
{

    private string $title;

    private DateTime $date;

    private string $content;

    private string $author;

    public function __construct()
    {
        $this->date = new DateTime();
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * @param string $content
     */
    public function setContent(string $content): void
    {
        $this->content = $content;
    }

    /**
     * @param string $author
     */
    public function setAuthor(string $author): void
    {
        $this->author = $author;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return DateTime
     */
    public function getDate(): DateTime
    {
        return $this->date;
    }

    /**
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * @return string
     */
    public function getAuthor(): string
    {
        return $this->author;
    }

    public function toArr () : array {
        $arr = [];
        $arr["title"] = $this->title;
        $arr["date"] = $this->date;
        $arr["content"] = $this->content;
        $arr["author"] = $this->author;
        return $arr;
    }



}