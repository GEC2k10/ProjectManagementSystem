<?php
	require_once("$_SERVER[DOCUMENT_ROOT]/classes/showusers.class.php");
	require_once("$_SERVER[DOCUMENT_ROOT]/classes/common.class.php");
	$page=new page("Uncommited Changes by $_GET[uname]");
	$user = new ShowUsers($_GET['uname']);
	$user->show_files($_GET['uname']);
?>
