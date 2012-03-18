<?php
	require_once("../../classes/git.class.php");
	$git=new git;
	$git->branch();
	header("location:/controllers/mail.php?flag=branch");
?>
