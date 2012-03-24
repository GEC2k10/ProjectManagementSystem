<?php
	require_once("$_SERVER[DOCUMENT_ROOT]/classes/database.class.php");
	$con = new Database();
	$con->messageDump();
	session_start();
	session_unset();
	session_destroy();
	//redirect to login page
	header('location:../views/login.php');
?>

