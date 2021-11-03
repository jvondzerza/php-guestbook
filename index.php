<?php

require "Post.php";
require "PostLoader.php";

$postLoader = new PostLoader();
$error = "";

/**
 * @throws JsonException
 */
function gimmeEntries () {
    return json_decode(file_get_contents("entries.json"), true, 512, JSON_THROW_ON_ERROR);
}

/**
 * @throws JsonException
 */
function putEmBack ($entries) {
   file_put_contents("entries.json", json_encode($entries, JSON_THROW_ON_ERROR));
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $post = new Post();
    if (isset($_POST["title"])) {
        $post->setTitle($_POST["title"]);
    }
    if (isset($_POST["content"])) {
        $post->setContent($_POST["content"]);
    }
    if (isset($_POST["author"])) {
        $post->setAuthor($_POST["author"]);
    }
    if ($post->getAuthor() && $post->getDate() && $post->getContent() && $post->getTitle()) {


        try {
            $post = $post->toArr();
            $entries = gimmeEntries();
            $entries[] = $post;
            putEmBack($entries);
        } catch (JsonException $e) {
        }

    } else {
        $error = "Please fill out all fields";
    }
}

require "view.php";