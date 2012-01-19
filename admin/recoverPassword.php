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
	<title>Recover Lost Password</title>
	<h4 align=right><a href=../controllers/logout.php>Logout</a></h4>
	<body bgcolor=#cfcfcf style='font-family:ubuntu'>
	<center><h1>Recover Lost Password</h1></center>
	<form action=controllers/reset.php method=post>
	Username <input type=text name=uname><br><br>
	Password <input type=password name=passwd><br><br>
	<input type=submit value='Reset Password'>
	</body>
	</html>";
	echo $page;
	}
?>
