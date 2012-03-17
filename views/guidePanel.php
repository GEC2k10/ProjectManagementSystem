<?php
	require_once("../classes/database.class.php");
	require_once("../classes/common.class.php");
	session_start();
	$con=new Database;
	$page=new page("Guide's Control Panel");
	if (!isset($_SESSION['uname']) || $_SESSION['uname']!=$_SESSION['projectName'])
		header("location:/views/loginwrong.html");
?>
