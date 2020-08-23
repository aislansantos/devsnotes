<?php

$dsn = "mysql:dbname=devsnotes;host=localhost";
$dbuser ="root";
$dbpass = "";

try{
    $pdo = new PDO($dsn, $dbuser, $dbpass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
    echo "F4LH0U:".$e->getMessage();
} 

$array = [
    'error' => '',
    'result' => []
];