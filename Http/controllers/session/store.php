<?php
use Core\Auth;
$email = $_POST['email'];
$password = $_POST['password'];
Auth::atempt($email,$password);
Auth::session('error',Auth::error());
redirect('/login');
