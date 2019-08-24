<?php

$content='<!DOCTYPE html>
<html>
<head>
	<title>aasdas</title>
</head>
<body>
<h1>Registration</h1>
	<form action="moiregister.php" method="POST">
		<p>Username</p>
	    <input type="text" name="username" placeholder="Username"><br>
	    <p>Password</p>
		<input type="password" name="password" placeholder="password"><br>
		<p>Confirm Password</p>
		<input type="password" name="repassword" placeholder="Confirm password"><br>
	    <input type="submit" name="submit">
	</form>
</body>
</html>';
include 'template.php';