<?php
$usename = 'root';
$password = '';

try{
    $pdo = new PDO('mysql:dbname=desafiophp;host=localhost', $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
    echo 'ERROR: ' . $e->getMessage();
}