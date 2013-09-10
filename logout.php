<?php
	include("user.class.php");
	$u = new user();
	$u->logout();
	header("Location: index.php");
	exit();
?>