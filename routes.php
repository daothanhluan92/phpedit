<?php

$router->get('/','controllers/index.php')->only('guest');
$router->get('/about','controllers/about.php')->only('guest');
$router->get('/contact','controllers/contact.php')->only('guest');

$router->get('/register','controllers/register/create.php')->only('guest');
$router->post('/register','controllers/register/store.php')->only('guest');