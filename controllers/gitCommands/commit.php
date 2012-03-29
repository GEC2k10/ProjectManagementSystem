<?php
	require_once("$_SERVER[DOCUMENT_ROOT]/classes/git.class.php");
	$git=new git;
	$git->commit();
	header("location:/controllers/mail.php?flag=commit");
?>

