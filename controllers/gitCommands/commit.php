<?php
	require_once("../../classes/database.class.php");
	include("../../config.php");
	session_start();
	$con=new Database;
	if($con->checkCookie($_SESSION['sessionID'],$_SESSION['uname']) == '0')
	{
		$con->close();
		header("location:../../views/loginwrong.html");
	}
	$message=$_POST['commitMessage']."\nEOC";
	chdir($GIT_ROOT);  // project name is passed to this script
	exec("git init ");
	exec("git add * ");
	exec("git commit -am '$message'",$a); // commits with an message 'message' 
	if($a[0][0]=='[')
	{
		$con->query("INSERT INTO messages VALUES('Commited Succesfully!!!!')");
		$head=substr($a[0],strpos($a[0],']')-7,7);
		$con->query("
		INSERT INTO Contributions VALUES('$_SESSION[projectName]','$_SESSION[projectName]','$head',NOW(),'1')");
		$con->query("UPDATE Contributions SET commit='1' WHERE projectName='$_SESSION[projectName]'");
		$con->close();
	}
	else
		$con->query("INSERT INTO messages VALUES('Nothing to Commit!!!')");
	$con->close();
	header("location:../../views/guide.php");
?>

