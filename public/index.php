<?php

use Core\Route;

const BASE_PATH = __DIR__.'/../';
require BASE_PATH.'/Core/functions.php';
#$id = $_GET['id'];
#$query = 'select usersName from sale where id = ?';
#$posts = $db->query($query,[$id])->fetchAll();
#foreach ($posts as $each){
 #   echo "<li>".$each['usersName']."</li>";
#}
require base_path('Core/Router.php');
#spl_autoload_register(function ($class){
    #$class = str_replace('\\',DIRECTORY_SEPARATOR,$class);
   # require base_path("Core/".$class.".php");
#});

$router =  new Route();
require  base_path('routes.php');
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$method = $_SERVER['REQUEST_METHOD'];
$router->router($uri,$method);

