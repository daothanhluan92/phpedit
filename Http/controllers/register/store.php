<?php
use Core\Database;
use Core\App;

$db = App::Container()->resolver('Core\Database');
$email = $_POST['email'];
$password = $_POST['password'];
$checkEmail = $db->query('select * from sale where usersMail = :email',[
    'email'=>$email
])->rowCount();
if($checkEmail == true){
}else{
    $db->query('insert into sale(usersMail,usersPwd) values(:email, :password)',[
        'email'=> $email,
        'password'=> password_hash($password, PASSWORD_BCRYPT)

    ]);
    $_SESSION['user'] = [
        'email'=> $email
    ];

    header('location:/');
}


