<?php


class Files {
    
    static function file(string $file, string $name ='', bool $force = false ){
        
        header('Content-type:' . mime_content_type($file));
        if ($force){
            header('Content-Disposition: attachment; filename=' . $name);
        }
        readFile($file);
    }
    
    
    static function forceDownload(string $file , string $name = '') {
        
        if ($name = '') {
            $name = $file;
        }
        self::file($file, $name, true);
        
    }
    
    static function redirect(string $url) {
        
        header('Location: ' . $url );
        
    }
    
}