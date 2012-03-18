<?php
	session_start();
	require_once("../../classes/database.class.php");
	$con=new Database;
	if($_SESSION['uname']!='admin')
		header("Location:/views/loginwrong.html");		
	else
	{
	$passwd=mysql_escape_string($_POST['passwd']);
	$uname=mysql_escape_string($_POST['uname']);
	echo "UPDATE Accounts SET passwd=SHA1('$passwd') WHERE uname='$uname'";

	$con->query("UPDATE Accounts SET passwd=SHA1('$passwd') WHERE uname='$uname'");
	$con->close();
	}
	header("location:/admin/views/adminHome.php");
?>

