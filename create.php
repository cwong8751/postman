<?php
require 'vendor/autoload.php';
use League\HTMLToMarkdown\HtmlConverter;

require 'utils/util.php';
initialize();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = htmlspecialchars($_POST['title']);
    $content = htmlspecialchars($_POST['content']);
    $author = htmlspecialchars($_POST['author']);

    # get timestamp
    $timestamp = time();

    # create file name
    $fileName = "$title.md";

    # create file path
    $filePath = "./posts/$fileName";

    # put the title content and author together
    $html = "<h1>$title</h1><p>$content</p><p>By $author</p>";

    # convert html to markdown
    $converter = new HtmlConverter();
    $markdown = $converter->convert($html);

    # write to file
    file_put_contents($filePath, $markdown);

    # redirect to index
    header('Location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>postman - write new</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <?php
    if (!is_logged_in()) {
        ?>
        <div class="container">
            <h1>Not logged in</h1>
            <p>You need to be logged in to create a post</p>
        </div>
        <?php
    } else {
        ?>
        <header>
            <button onclick="location.href='auth.php'">Login</button>
            <?php
            if (is_logged_in()) {
                echo '<button onclick="location.href=\'create.php\'">Post</button>
        <button onclick="location.href=\'settings.php\'">Settings</button>';
            }
            ?>
        </header>
        <div class="container">
            <h1>Create New Post</h1>
            <form action="" method="post">
                <div class="form-group">
                    <label for="title">Title:</label>
                    <input type="text" id="title" name="title" placeholder="Enter post title" required>
                </div>
                <div class="form-group">
                    <label for="content">Content:</label>
                    <textarea id="content" name="content" rows="5" placeholder="Enter post content" required></textarea>
                </div>
                <div class="form-group">
                    <label for="author">Author:</label>
                    <input type="text" id="author" name="author" placeholder="Enter author name" required>
                </div>
                <div class="form-group">
                    <button type="submit">Create Post</button>
                </div>
            </form>
        </div>
        <?php
    }
    ?>
</body>

</html>