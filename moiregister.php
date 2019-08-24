<?php



// username da e pone 7 simvola
// parola da e pone 7


//Login logic
require "config.php";
include 'template.php';
//$sql = mysqli_query($link, "INSERT INTO users(username)VALUES ($username);") 


//START OF Register logic


if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $repassword = $_POST['repassword'];

    if(!empty($username) and strlen($username) > 7){
        if(!empty($password) and strlen($password) > 7){
            if(!empty($repassword) and $repassword == $password){
                
                $sql = mysqli_query($link, "INSERT INTO users(username,password)
                                            VALUES ('$username','$password');");
                echo "<h1>Account created succesfully!</h1>";
                
            } else {
                echo "Passwords must match.";
            }
        } else {
            echo "The password must be at least 7 characters long.";
        }
    } else {
        echo "The username must be at least 7 characters long.";
    }

}


// END OF Register logic



