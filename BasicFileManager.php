<?php

// BasicFileManager.php, archivo se llama como la clase

// los archivos de php nunca se cierran al final, salvo que haya que cerrarlos, porque despuÃ©s hay algo

error_reporting(E_ALL);

class BasicFileManager {

    
    function __construct() {
        
    }
    
    //orden alfabÃ©tico
    
    function createFolder(string $name) {
        $created = false;
        if (!is_dir($name)) {
            mkdir($name);
            $created = true;
        }
        return $created;
    }

    function deleteFile(string $name) {
        if (file_exists($name)) {
            unlink($name);
        }
    }

    private function prefix() {
        //aaaammddhhMMss
        $date = new DateTime();
        $timezone = new DateTimeZone('Europe/Madrid');
        $date->setTimezone($timezone);
        return $date->format('YmdHis');
    }
    function set($name, $target) {
        $number = 1;
        $created = $this->createFolder($target);
        $uploaded = $this->upload($name, $target);
        if(!$uploaded) {
            if($created) {
                rmdir($target); 
            }
            $number = 0;
        }
        return $number;
    }

function upload(string $name, string $target) {
    if (isset($_FILES[$name]) &&
        $_FILES[$name]['error'] === 0 &&
        str_contains(mime_content_type($_FILES[$name]['tmp_name']), 'text/plain')) {
        $fileName = $this->prefix() . '_' . $_FILES[$name]['name'];
        return move_uploaded_file($_FILES[$name]['tmp_name'], $target . '/' . $fileName);
    }
    return false;
}

}