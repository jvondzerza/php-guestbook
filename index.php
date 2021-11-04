<?php

require "Post.php";
require "EmojiModifier.php";
require "ProfanityChecker.php";
require "PostLoader.php";

$error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $post = new Post();
    $sanitizer = new ProfanityChecker();
    $postLoader = new PostLoader();

    if (isset($_POST["title"]) && !empty($_POST["title"])) {
        $post->setTitle(htmlspecialchars($_POST["title"]));
    }
    if (isset($_POST["content"]) && !empty($_POST["content"])) {
        $post->setContent(htmlspecialchars($_POST["content"]));
    }
    if (isset($_POST["author"]) && !empty($_POST["author"])) {
        $post->setAuthor(htmlspecialchars($_POST["author"]));
    }
    if (isset($_POST["number-of-entries"]) && !empty($_POST["number-of-entries"])) {
        $postLoader->setNumberOfEntries($_POST["number-of-entries"]);
    }
    if ($post->getAuthor() && $post->getDate() && $post->getContent() && $post->getTitle()) {
        try {
            $post = $post->toArr();
            $sanitizer->sanityCheck($post, $sanitizer->getProfanity());
            if (count($sanitizer->getProfanityCheck()) > 0) {
                $error = "Profanity detected, keep it sanitary!";
            } else {
                $entries = $postLoader->gimmeEntries();
                array_unshift($entries, $post);
                $postLoader->putEmBack($entries);
            }
        } catch (JsonException $e) {
        }
    } else {
        $error = "Please fill out all the fields";
    }
}

require "view.php";