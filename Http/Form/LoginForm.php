<?php
namespace Http\Form;
use Core\Auth;
use Core\Validate;
class LoginForm
{
    public static $error = [];
    public function __construct(public array $atributes){
        if(! Validate::string($atributes['password'])){
            static::$error['password'] = 'Password No Valid';
        }
        if (! Validate::email($atributes['email'])){
            static::$error['email'] = 'Email No Valid';
        }
    }
    public static function checkLogin($atributes){
        $instance =  new static($atributes);
        if (! empty(static::$error)){
            throw new \Exception('Error');
        }
        return $instance;
    }
}
