<?php
	session_start();
	include 'core/connectdb.php';
				include 'core/login.inc.php';
				
	
	unset($_SESSION['id']);

	
	
	header("Location: index.php");
	exit();
?>