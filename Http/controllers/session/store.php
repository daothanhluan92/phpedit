<?php
use Core\Auth;
use Core\Session;
use Http\Form\LoginForm;

LoginForm::checkLogin($atributes = [
    'email' => $_POST['email'],
    'password' => $_POST['password']
]);

//if (! LoginForm::error()) {
//    if (Auth::atempt($email, $password) === null) {
//        redirect('/');
//    }
//}
//Session::flash('old',$email);
//Session::flash('error', Auth::atempt($email, $password));
//redirect('/login');
