<?php 
	require_once("$_SERVER[DOCUMENT_ROOT]/classes/git.class.php");
	$git=new git;
	$git->checkout();
	header("location:/controllers/mail.php?flag=branch");
?>
