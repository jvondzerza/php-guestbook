<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<section id="new-entry">
    <form method="post">
        <label for="new-entry">Guestbook Entry</label>
        <input type="text" name="title" placeholder="Title">
        <input type="text" name="content" placeholder="Your entry here">
        <input type="text" name="author" placeholder="Author">
        <input type="submit" value="Submit entry">
    </form>
</section>
<section id="guest-book">
    <?php
    try {
        $entries = gimmeEntries();
        krsort($entries);
        for ($i=0, $iMax = count($entries); $i < $iMax; $i++ ) {
            echo $postLoader->headingWrap($entries[$i]["title"], 1);
            echo $postLoader->headingWrap(substr($entries[$i]["date"]["date"], 0, -7), 3);
            echo $postLoader->contentWrap($entries[$i]["content"]);
            echo $postLoader->headingWrap($entries[$i]["author"], 2);
            echo "<br>";
        }
    } catch (JsonException $e) {
    }

    ?>
</section>

</body>
</html>
