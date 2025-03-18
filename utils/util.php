<?php

// function to initialize program
function initialize() {
    $folderPath = __DIR__ . '/posts';
    if (!is_dir($folderPath)) {
        mkdir($folderPath, 0755, true);
    }

    // check login
    session_start();
    if (!isset($_SESSION['user'])) {
        echo 'You are not logged in';
    }
}