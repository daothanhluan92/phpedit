<?php
namespace Http\Form;
use Core\Validate;
class LoginForm
{
    public static $error = [];
    public static function checkLogin($email,$password){
        if(! Validate::string($password)){
            static::$error['password'] = 'Password No Valid';
        }
        if (! Validate::email($email)){
             static::$error['email'] = 'Email No Valid';
        }
    }
    public static function error(){
        return static::$error;
    }
}