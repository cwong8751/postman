<?php
require 'vendor/autoload.php';
require 'utils/util.php';
initialize();

// check logged in
if (is_logged_in()) {
    header("Location: index.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    # read from .env
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
    $dotenv->load();

    # get users from .env
    $envUser = $_ENV['USER'];
    $envPass = $_ENV['PASS'];

    //TODO: use a secure way to store and compare passwords
    if (($envUser == $username && $password == $envPass)){
        $_SESSION['user'] = $username;
        header("Location: index.php");
        exit;
    }
    else{
        echo "Invalid credentials";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header>
        <button onclick="location.href='index.php'">Main</button>
    </header>
    <div class="container">
        <h2>Login</h2>
        <form action="auth.php" method="post">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
            <br><br>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <br><br>
            <button type="submit">Login</button>
        </form>
    </div>

</body>