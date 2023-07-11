<?php
    function dd($value){
        echo '<pre>';
        var_dump($value);
        echo '</pre>';
        die();
    }
    function urlIs($url){
        return $_SERVER['REQUEST_URI']===$url;
    }
    function base_path($path){
        return BASE_PATH.$path;
    }
    function view($path,$attribution=[]){
        extract($attribution);
        require base_path('views/'.$path);
    }
    function rowCount($result){
        return $result->rowCount();
    }