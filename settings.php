<?php
require 'utils/util.php';
initialize();

// access control
if (!is_logged_in()) {
    ?>
    <link rel="stylesheet" href="style.css">
    <div class="container">
        <h1>Not logged in</h1>
        <p>You need to be logged in to create a post</p>
    </div>
    <?php
    exit;
} 
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Settings</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header>
        <button onclick="location.href='index.php'">Main</button>
        <button onclick="location.href='create.php'">Post</button>
    </header>
    <div class="container">
        <h2>Settings</h2>
        <hr>
        <h3>Account</h3>
        <form>
            <input type="text" id="username" name="username" placeholder="Enter username" required>
            <input type="password" id="password" name="password" placeholder="Enter password" required>
            <input type="submit">
        </form>

        <h3>Cosmetics</h3>
        <form>
            <input type="text" id="blog-title" placeholder="Enter blog title" required>
            <input type="text" id="blog-subtitle" placeholder="Enter blog subtitle" required>
            <input type="submit">
        </form>

        <h3>Posting</h3>
        <form>
            <input type="text" id="author"placeholder="Enter author name" required>
            <input type="submit">
        </form>

        <h3>Data</h3>
        <form>
            <input type="button" value="Delete all posts">
            <input type="button" value="Export all posts">
        </form>

        <h3>Log out</h3>
        <form>
            <input type="button" id="logout-btn" value="Log out">
        </form>
    </div>

</body>