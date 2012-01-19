<?php
	session_start();
	require_once("../classes/database.class.php");
	$con=new Database;
	if ($con->query("SELECT uname FROM Accounts WHERE sessionID='$_SESSION[sessionID]'")==0)
	{
		$con->close();
		header("Location:/lag/views/login.html");		
	}
	else
	{
	$con->close();
	echo "
	<html>
	<title>Administrator Page</title>
	<h4 align=right><a href=../controllers/logout.php>Logout</a></h4>
	<h1 align=center>Add New Users</h1>
	<body bgcolor=#cfcfcf style='font-family:ubuntu'>
	<form action=controllers/add.py method=post>
	";

	echo "<div style='left:75px;position:absolute'>Username</div>";
	echo "<div style='left:250px;position:absolute'>Project</div>";
	echo "<div style='left:425px;position:absolute'>Email</div><br>";
	for($i=0;$i<10;$i++)
	{
		echo $i;
		echo ".&nbsp;<input type=text name=uname[$i]>";
		echo "<input type=text name=project[$i]>";
		echo "<input type=text name=email[$i]><br>";

	}
	echo "
	<br><br>
	Email Account details:<br><br>
	Username <input type=text value=gecgitrepository readonly><br>
	Password&nbsp <input type=password name=password><br>
	<input type=submit value='Add Users'>
	</form>
	</body>
	</html>";
	}
?>

