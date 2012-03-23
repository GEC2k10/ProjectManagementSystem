<?php
	require_once("$_SERVER[DOCUMENT_ROOT]/classes/git.class.php");
	include("$_SERVER[DOCUMENT_ROOT]/config.php");
	$git=new git;
	$git->branch();
	header("location:/controllers/mail.php?flag=branch");
?>
