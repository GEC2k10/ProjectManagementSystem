<?php
	require_once("../classes/database.class.php");
	require_once("../classes/common.class.php");
	session_start();
	$con=new Database;
	$page=new page("Guide's Control Panel");
	if($con->checkCookie($_SESSION['sessionID'],$_SESSION['projectName'])==0)
	{
		$con->close();
		header("/views/loginwrong.html");
	}
