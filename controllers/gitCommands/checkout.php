<?php 
	session_start();
	require_once("../../classes/database.class.php");
	$con=new Database;
	if($con->checkCookie($_SESSION['sessionID'],$_SESSION['uname'])==0)
	{
		$con->close();
		header("location:../../../views/loginwrong.html");
	}
	$con->close();
	chdir("/var/www/repos/$_SESSION[projectName]/");
	exec("git checkout $_POST[version]");
	header("location:../../views/guide.php");
?>
