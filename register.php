<?php
session_start();

if (!isset($_SESSION['login']) ) {
	header('Location: login.php');
	exit;
}

require 'functions.php';

if( isset($_POST['signup']) ) {
	if ( registration($_POST) > 0 ) {
		echo "<script>
			alert('New users added successfully');
		</script>
		";
	} else {
		echo mysqli_error($conn);
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Registration</title>
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>
<body>
	<h1>User Registration</h1>
	<form action="" method="post">
	<fieldset style="width: 350px">
		<legend>Registration Form</legend>
		<table cellspacing="10">
			<tr>
			    <td><label for="username">Username:&nbsp;</label></td>
			    <td><input type="text" name="username" id="username"></td>
			</tr>
			<tr>
			    <td><label for="password">Password:&nbsp;</label></td>
			    <td><input type="password" name="password" id="password"></td>
			</tr>
			<tr>
			    <td><label for="passwordConfirmation">Confirm Password:&nbsp;</label></td>
			    <td><input type="password" name="passwordConfirmation" id="passwordConfirmation"></td>
			</tr>
		</table>
		<div align="right"><td><button type="submit" name="signup">Sign Up!</button></td></div>
	</fieldset>
	</form>
</body>
</html>