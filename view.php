<?php

require('classes/Request.php');

$file = Request::get('file');
$folder = Request::get('folder');

if (!empty($file)) {
    $filePath = 'root/' . $folder . '/' . $file;
    $fileContent = file_get_contents($filePath);

    echo '<h2>Viewing File: ' . substr($file, 15) . '</h2>';
    echo '<div>' . nl2br($fileContent) . '</div>';
} else {
    echo 'File not found.';
}
?>