<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<section id="new-entry">
    <form method="post">
        <h1>Guestbook Entry</h1>
        <label>
            <input id="title" type="text" name="title" placeholder="Title" >
        </label>
        <label>
            <input id="content" type="text" name="content" placeholder="Your entry here">
        </label>
        <label>
            <input type="text" name="author" placeholder="Author">
        </label>
        <label>
            <input type="number" name="number-of-entries" placeholder="Number of entries">
        </label>
        <input id="submit" type="submit" value="Submit entry">
    </form>
</section>
<section id="error-display">
    <p><?php if (isset($error)) {
            echo $error;
        }?></p>
</section>
<section id="guest-book">
        <?php
        if (isset($postLoader)) {
            try {
                echo implode("", $postLoader->displayPosts());
            } catch (JsonException $e) {
            }
        }
        ?>
</section>

</body>
</html>
