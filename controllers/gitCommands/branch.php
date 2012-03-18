<?php
	require_once("../../classes/git.class.php");
	include("$_SERVER[DOCUMENT_ROOT]/config.php");
	$git=new git;
	$git->branch();
	header("location:/views/guide.php");
//	header("location:/controllers/mail.php?flag=branch");
?>
