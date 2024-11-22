<?php
session_start();
$host = "localhost:3308";
$user = "root";
$password = "";
$dbname = "managers";
$dsn = "mysql:host={$host};dbname={$dbname}";
$pdo = new PDO($dsn, $user, $password);
$pdo->exec("SET time_zone = '+08:00'");
?>