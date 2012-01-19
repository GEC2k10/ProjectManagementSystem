<?php
	session_start();
	require_once("../classes/database.class.php");
	$con=new Database;
	if ($con->query("SELECT uname FROM Accounts WHERE sessionID='$_SESSION[sessionID]'")==0)
	{
		$con->close();
		header("Location:../views/login.html");		
	}
	else
	{
	$con->close();
	$page="
	<html>
	<title>Administrator Page</title>
	<h4 align=right><a href=../controllers/logout.php>Logout</a></h4>
	<body bgcolor=#cfcfcf style='font-family:ubuntu'>
	<center><h1>Welcome to Administrator page</h1></center>
	<h2>Administrative tasks</h2>
	<h3>
	1.<a href='newUsers.php'>Add new users</a><br>
	2.<a href='recoverPassword.php'>Recover lost password</a>
	</h3>
	</body>
	</html>";
	echo $page;
	}
?>
