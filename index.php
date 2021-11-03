<?php

require "Post.php";
require "PostLoader.php";

$postLoader = new PostLoader();
$error = "";
$profanity = ["fuck", "shit", "Fuck", "Shit"];
$profanityCheck = [];

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
        $post->setTitle(htmlspecialchars($_POST["title"]));
    }
    if (isset($_POST["content"])) {
        $post->setContent(htmlspecialchars($_POST["content"]));
    }
    if (isset($_POST["author"])) {
        $post->setAuthor(htmlspecialchars($_POST["author"]));
    }
    if (isset($_POST["number-of-entries"])) {
        $postLoader->setNumberOfEntries($_POST["number-of-entries"]);
    }
    if ($post->getAuthor() && $post->getDate() && $post->getContent() && $post->getTitle()) {
        try {
            $post = $post->toArr();
            for ($i = 0, $iMax = count($profanity); $i < $iMax; $i++) {
                if (in_array($profanity[$i], $post, true)) {
                    $profanityCheck[] = $profanity[$i];
                }
            }
            if (count($profanityCheck) > 0) {
                $error = "Profanity detected! Keep your entry clean!";
            } else {
                $entries = gimmeEntries();
                array_unshift($entries, $post);
                putEmBack($entries);
            }
        } catch (JsonException $e) {
        }
    } else {
        $error = "Please fill out all fields";
    }
}

require "view.php";