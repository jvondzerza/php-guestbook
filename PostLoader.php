<?php

class PostLoader
{
    public function headingWrap ($postParam, $headingLevel) : string {
        return "<h" . $headingLevel . ">" . $postParam . "</h" . $headingLevel . ">";
    }

    public function contentWrap ($content) : string {
        return "<p>" . $content . "</p>";
    }
}