<?php
session_start();
use Core\Router;
use Core\Session;

const BASE_PATH = __DIR__.'/../';
require BASE_PATH.'/Core/functions.php';
spl_autoload_register(callback: function ($class){
    $class = str_replace("\\","/", $class);
    require base_path("{$class}.php");
});
require base_path('bootstrap.php');
$router =  new Router();
require base_path('routes.php');
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$method = $_SERVER['REQUEST_METHOD'] ?? $_POST['_method'];
$router->router($uri,$method);
Session::unflash('error');


