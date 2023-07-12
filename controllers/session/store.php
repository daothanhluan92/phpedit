<?php
use Core\Database;
use Core\App;
$db = App::Container()->resolver('Core\Database');
$email = $_POST['email'];
$password = $_POST['password'];
$checkEmail = $db->query('select * from sale where usersMail = :email', [
    'email' => $email
]);
$obj = find($checkEmail);
if ($obj == true) {
    $hashPass = $obj['usersPwd'];
    if(password_verify($password,$hashPass) ?? false){
        userSession($email);
        header('location:/');
        exit();
    }
}
view('login.view.php',[
    'error' => 'Email or Password No Valid'
]);
