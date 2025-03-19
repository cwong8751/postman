<?php
error_reporting(E_ALL & ~E_DEPRECATED & ~E_NOTICE);
require 'vendor/autoload.php';
require 'utils/util.php';
initialize();

$blogPostContent = "";

if (isset($_GET['file'])) {
    $fileName = $_GET['file'];

    // sanitize the file name
    $fileName = basename($fileName);

    $fullPath = "./posts/$fileName";

    if (file_exists($fullPath)) {
        $Parsedown = new Parsedown();
        $markdown = file_get_contents($fullPath);
        $html = $Parsedown->text($markdown);
        $blogPostContent = $html;
    } else {
        echo "File not found";
    }

} else {
    echo "something went wrong";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Post</title>
</head>

<body>
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
        <?php echo $blogPostContent; ?>
    </div>
</body>

</html>