<?php
use Core\App;
use Http\Form\LoginForm;
$email = $_POST['email'];
$password = $_POST['password'];
LoginForm::checkLogin($email,$password);
if (!empty(LoginForm::error())) {
    view('register.view.php',[
       'error' => LoginForm::error()
    ]);
}
$db = App::Container()->resolver('Core\Database');
$checkEmail = $db->query('select * from sale where usersMail = :email',[
    'email'=>$email
])->rowCount();
if($checkEmail){

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


