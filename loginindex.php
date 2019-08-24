<?php

$content = '
	<html>
	<head>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<title>Login</title>
		 <link href="signin.css" rel="stylesheet">
	</head>
	<body class="text-center">

		<form class="form-signin" action="login.php" method="POST">
			<p>Username</p>
			<input type="text" name="username">
			<p>Password</p>
			<input type="password" name="password"><br>
			<input type="submit" name="submit">
			<button type="submit" formaction="regpage.php">Register</button>
		</form>
		
		




	  </body>
	  </body>
	</html>';
	
include('login.php');
if(isset($_SESSION['login_user'])){
    header("location:profile.php"); //Redirecting to profile.php
}

include 'template.php';
