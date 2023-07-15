<?php

namespace Core;

class Auth
{
    public function atempt($email,$password){
        $checkEmail = App::Container()->resolver(Database::class)
            ->query('select * from sale where usersMail = :email', [
            'email' => $email
        ]);
        $obj = find($checkEmail);
        if ($obj ?? false) {
            $hashPass = $obj['usersPwd'];
            if(password_verify($password,$hashPass) ?? false){
                createUserSession($email);
                redirect();
            }
        }
    }
}