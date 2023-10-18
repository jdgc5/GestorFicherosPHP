<?php

require('classes/Request.php');

$folder = Request::get('folder');
$dirPath = 'root/' . $folder;
$files = scandir($dirPath);

echo '<h2>View All Files in ' . $folder . '</h2>';
$combinedContent = '';

foreach ($files as $file) {
    $filePath = $dirPath . '/' . $file;
    if (is_file($filePath) && pathinfo($file, PATHINFO_EXTENSION) === 'txt') {
        $fileContent = file_get_contents($filePath);
        $combinedContent .= "<h3>File " . substr($file, 15) . "</h3>";
        $combinedContent .= "<div>" . nl2br($fileContent) . "</div>";
    }
}

echo $combinedContent;
?>