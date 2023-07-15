<?php

use Core\Auth;

$email = $_POST['email'];
$password = $_POST['password'];
(new Auth)->atempt($email,$password);
view('login.view.php',[
    'error' => 'Email or Password No Valid'
]);
