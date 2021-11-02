<?php
session_start();
require 'functions.php';

// check cookie
if (isset($_COOKIE['id']) && isset($_COOKIE['username']) ) {
	$id = $_COOKIE['id'];
	$username = $_COOKIE['username'];

	// ambil username berdaasarkan id
	$sqlCheckCookie = "SELECT username FROM users WHERE user_id = $id";
	$result = mysqli_query($conn,$sqlCheckCookie);

	$row = mysqli_fetch_assoc($result);
	if ( $username === hash('sha256', $row['username']) ) {
		$_SESSION['login'] = true;
	}
}

if (isset($_SESSION['login'])) {
	header('Location: index.php');
	exit;
}


if (isset($_POST['login'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];

	$sqlCheckLogin = "SELECT * FROM users WHERE username = '$username'";
	$result = mysqli_query($conn, $sqlCheckLogin);

	// check username
	if (mysqli_num_rows($result) > 0 ) {
		// check password
		$row = mysqli_fetch_assoc($result);

		if( password_verify($password, $row['password']) ) {
			// set session
			$_SESSION['login'] = true;
			// check remember me
			if ( isset($_POST['remember']) ) {
				// create cookie
				setcookie('id', $row['user_id'], time()+60);
				setcookie('username', hash('sha256', $row['username']), time()+60);
			}
			header("Location: index.php");
			exit;
		}
	} 
	$error = true;
}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Login Pages</title>
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>
<body>
	<h1>Login</h1>
	<form action="" method="post">
		<fieldset style="width: 300px">
			<legend>Login Form</legend>
			<table cellpadding="10">
				<tr>
				    <td><label for="username">Username:&nbsp;</label></td>
				    <td><input size="30" type="text" name="username" id="username"></td>
				</tr>
				<tr>
				    <td><label for="password">Password:&nbsp;</label></td>
				    <td><input size="30" type="password" name="password" id="password"></td>  
				</tr>	
			</table>
			<td>
			<label for="remember"></label>
			<input type="checkbox" name="remember" id="remember">Remember Me</td>
			
			<div align="right">
				<button type="submit" name="login">Sign In!</button>
			</div>
			<div align="center">
			<?php if( isset($error)) : ?>
				<p style="color: red;">Check your username or password!</p>
			<?php endif; ?>
			</div>
		</fieldset>
	</form>
</body>
</html>