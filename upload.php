    <?php

    require('BasicFileManager.php');
    require('classes/Request.php');
    require('classes/Files.php');
    
    $folder = Request::post('folder');
    
    $bfm = new BasicFileManager();
    $result = $bfm->set('file', 'root/' . $folder);
    
    header('Location: index.php?result=' . $result );
    

