<?php

//Define database credentials

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'login');


//Attempt to connect to MySQL database PROCEDURAL
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

if($link == false){
    die("Error: Could not connect. ". mysqli_connect_error());
}
mysqli_select_db($link, "login");

//OOP WAY
// $mysqli = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// if($mysqli == false){
//     die("Error: Could not connect. " . $mysqli->connect_error)
// }

// PDO
// try{
//     $pdo = new PDO("mysql:host=" . DB_SERVER . ";dbname" . DB_NAME, DB_USERNAME, DB_PASSWORD);
//     Set the PDO error mode to exception
//     $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// }catch(PDOException $e){
//     die("ERROR: Could not connect. " . $e->getMessage());
//}
?>