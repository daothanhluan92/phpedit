<?php
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

$routes = [
    '/'=>'controllers/index.php',
    '/about'=>'controllers/about.php',
    '/contact'=>'controllers/contact.php',
];

function routeController($uri,$routes){
    if(array_key_exists($uri,$routes)){
        require $routes[$uri];

    }else {
        abort();
    }
}
routeController($uri,$routes);
function abort($error=404){
    http_response_code($error);
    require "views/{$error}.php";
    die();
}