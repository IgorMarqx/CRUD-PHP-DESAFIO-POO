<?php
$usename = 'root';
$password = '';

try{
    $pdo = new PDO('mysql:dbname=desafiophp;host=localhost', $usename, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    return $pdo;
}catch(PDOException $e){
    echo 'ERROR: ' . $e->getMessage();
}