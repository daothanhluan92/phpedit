<?php
require 'functions.php';
#require  'routes.php';

$dsn = "mysql:host=localhost;port=3306;dbname=sale;";
$pdo = new PDO($dsn,'root');
$statement = $pdo->prepare("select usersName from sale");
$statement->execute();
$posts = $statement->fetchAll(PDO::FETCH_ASSOC);

foreach ($posts as $each){
    echo "<li>".$each['usersName']."</li>";
}