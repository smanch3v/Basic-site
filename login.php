<?php

require "config.php";
session_start();

$error = ''; //Storing error messages
if(isset($_POST['submit'])) {
    if(empty($_POST['username']) || empty($_POST['password'])) {
        $error = "Username or Password is invalid";
        echo $error;
    } else {
        //Defining username and password
        $username = $_POST['username'];
        $password = $_POST['password'];

        $query = "SELECT username,password FROM users WHERE username=? AND password=? LIMIT 1";
        $stmt = $link->prepare($query);
        $stmt-> bind_param("ss",$username,$password);
        $stmt->execute();
        $stmt->bind_result($username,$password);
        $stmt->store_result();

        // if($_POST['username'] != $username || $_POST['password' != $password]){
        //     $error = "Username ili parola greshno";
        //     echo $error;
        // }
        if($stmt->fetch()) { //fetching the contents of the row
            $_SESSION['login_user'] = $username; //Initializing session
            header("location:profile.php");

        }
    }
    mysqli_close($link);
}
?>