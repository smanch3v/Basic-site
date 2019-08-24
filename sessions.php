<?php
require "config.php";
session_start();
$user_check = $_SESSION['login_user'];
$query = "SELECT username FROM users WHERE username = '$user_check'";
$ses_sql = mysqli_query($link, $query);
$row = mysqli_fetch_assoc($ses_sql);
$login_session = $row['username'];


?>