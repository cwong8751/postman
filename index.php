<?php
// index.php
require 'vendor/autoload.php';
require 'utils/util.php';
$environment = initialize();

$blogTitle = $_ENV['BLOG_TITLE'];
$blogSubtitle = $_ENV['BLOG_SUBTITLE'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>postman</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header>
        <?php
        if (is_logged_in()) {
            echo '<button onclick="location.href=\'create.php\'">Post</button>
        <button onclick="location.href=\'settings.php\'">Settings</button>';
        }
        else{
            echo '<button onclick="location.href=\'auth.php\'">Login</button>';
        }
        ?>
    </header>

    <div class="container">
        <h1><?php echo $blogTitle; ?></h1>
        <p><?php echo $blogSubtitle; ?></p>
        <?php
        $directory = './posts';
        if (is_dir($directory)) {
            $files = scandir($directory);
            foreach ($files as $file) {
                if ($file !== '.' && $file !== '..') {
                    $renderPath = 'render.php?file=' . urlencode($file);
                    echo '<a href=' . $renderPath . '>' . htmlspecialchars($file) . '</a>';
                }
            }
        } else {
            echo '<p>No directory found at ' . htmlspecialchars($directory) . '</p>';
        }
        ?>
        </d>
</body>

</html>