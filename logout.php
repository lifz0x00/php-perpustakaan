<?php 
// remove session
session_start();
$_SESSION = [];
session_unset();
session_destroy();
// remove cookie
setcookie('id', '', time() - 3600);
setcookie('username', '', time() - 3600);

header("Location: login.php");
exit;	
?>