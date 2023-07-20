<?php
use Core\App;
use Core\Session;
use Http\Form\LoginForm;
$email = $_POST['email'];
$password = $_POST['password'];
LoginForm::checkLogin($email,$password);
if (!empty(LoginForm::error())) {
    Session::flash('error',LoginForm::error());
    redirect('/register');
}
$db = App::Container()->resolver('Core\Database');
$checkEmail = $db->query('select * from sale where usersMail = :email',[
    'email'=>$email
])->rowCount();
if($checkEmail){
 redirect('/register');
}else{
    $db->query('insert into sale(usersMail,usersPwd) values(:email, :password)',[
        'email'=> $email,
        'password'=> password_hash($password, PASSWORD_BCRYPT)

    ]);
    Session::put('user',[
        'email'=>$email
    ]);
    header('location:/');
}


