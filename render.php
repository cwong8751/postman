<?php
error_reporting(E_ALL & ~E_DEPRECATED & ~E_NOTICE);
require 'vendor/autoload.php';
require 'utils/util.php';
initialize();

if (isset($_GET['file'])) {
    $fileName = $_GET['file'];

    // sanitize the file name
    $fileName = basename($fileName);

    $fullPath = "./posts/$fileName";

    if (file_exists($fullPath)) {
        $Parsedown = new Parsedown();
        $markdown = file_get_contents($fullPath);
        $html = $Parsedown->text($markdown);

        echo $html;
    } else {    
        echo "File not found";
    }

} else {
    echo "something went wrong";
}
?>