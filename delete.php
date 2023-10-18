<?php

require('BasicFileManager.php');
require('classes/Request.php');

$fileToDelete = Request::request('file');

$bfm = new BasicFileManager();

if (!empty($fileToDelete)) {
    $deleted = $bfm->deleteFile($fileToDelete);
    header('Location: index.php');
    
}
