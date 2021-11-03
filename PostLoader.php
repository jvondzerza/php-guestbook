<?php

class PostLoader
{
    private int $numberOfEntries = 20;

    public function headingWrap ($param, $headingLevel) : string {
        return "<h" . $headingLevel . ">" . $param . "</h" . $headingLevel . ">";
    }

    public function contentWrap ($param) : string {
        return "<p>" . $param . "</p>";
    }

    /**
     * @return int
     */
    public function getNumberOfEntries(): int
    {
        return $this->numberOfEntries;
    }

    /**
     * @param int $numberOfEntries
     */
    public function setNumberOfEntries(int $numberOfEntries): void
    {
        $this->numberOfEntries = $numberOfEntries;
    }


}