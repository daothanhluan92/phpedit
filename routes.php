<?php

$router->get('/','controllers/index.php');
$router->get('/about','controllers/about.php')->only('guest');
$router->get('/contact','controllers/contact.php')->only('guest');

$router->get('/register','controllers/register/create.php')->only('guest');
$router->post('/register','controllers/register/store.php')->only('guest');


$router->get('/login','controllers/session/index.php')->only('guest');
$router->post('/login','controllers/session/store.php')->only('guest');
$router->post('/logout','controllers/session/destroy.php')->only('auth');


$router->get('/middleware','Core/Middleware/Middleware.php')->only('guest');

