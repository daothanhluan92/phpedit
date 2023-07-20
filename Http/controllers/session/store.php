<?php
use Core\Auth;
use Core\Session;
$email = $_POST['email'];
$password = $_POST['password'];
if(Auth::atempt($email,$password) !== null){
    Session::flash('error',Auth::atempt($email,$password));
};
redirect('/login');
