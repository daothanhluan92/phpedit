<?php

namespace Core;

class Validate
{
    public static function string($long,$min=1,$max = INF){
        $long = trim($long);
        if (strlen($long) >= $min && strlen($long) < $max){
            return true;
        }else{
            return  false;
        }
    }
    public static function email($email){
       return filter_var($email,FILTER_VALIDATE_EMAIL);
    }

}