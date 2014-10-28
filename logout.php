<?php
	session_start();
	$_SESSION = array();
	session_destroy();
	header("Location: photo_login.php");
?>
