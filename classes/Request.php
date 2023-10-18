<?php

class Request{
    
    
    private static function getPost(string $name, array $getpost){
        $value ='';
        if (isset($getpost[$name])) {
            $value = $getpost[$name];
    } 
        return $value;
    }
    
    static function get(string $name) {
        return self::getpost($name, $_GET); 
    
    }
    
    static function post(string $name) {
        return self::getpost($name, $_POST);
        
    }

    static function request (string $name) {
        $result = self::post($name);
        if ($result =='') {
            $result = self::get($name);
        }
        return $result;
    }
    
}