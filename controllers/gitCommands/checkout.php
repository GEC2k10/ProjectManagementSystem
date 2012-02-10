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
	exec("git checkout $_GET[version]");
	chdir("/var/www/repos/");
	exec("zip -r ../downloads/$_SESSION[sessionID].zip $_SESSION[projectName]");
	chdir("/var/www/downloads/");
	header( "Content-Disposition: attachment; filename=$_SESSION[sessionID].zip" ); 
	readfile("$_SESSION[sessionID].zip");
	chdir("/var/www/repos/$_SESSION[projectName]");
	exec("git checkout master");
	header("location:../../views/guide.php");
?>
