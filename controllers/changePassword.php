<?php
	session_start();
	require_once("../classes/database.class.php");
	if (!isset($_SESSION['uname']))
		header("location:../views/loginwrong.html");
	$con=new Database;
	$cur=sha1(mysql_escape_string($_POST['current']));
	$reply=$con->query("SELECT passwd FROM Accounts WHERE uname='$_SESSION[uname]' AND passwd='$cur'");
	$error="
	<html>
	<body bgcolor=#cfcfcf>
	<font face=ubuntu>
	<h1>Error!!!!!!!!!!!!</h1>
	1.Current password is wrong<br>
	2.The entered passwords dont match <br>
	3.The password is too short <br>
	<a href=../views/changePassword.php>Try again....</a><br>
	<a href=homePage.php>Home</a>
	</font>
	</body>
	</html>
	";
	if($reply==0)
		echo $error;
	else if(strcmp($_POST['new'],$_POST['repeat'])!=0)
		echo $error;
	else if(strlen($_POST['new'])<6)
		echo $error;
	else
	{
		$passwd=sha1(mysql_escape_string($_POST['new']));
		$con->query("UPDATE Accounts SET passwd='$passwd' WHERE uname='$_SESSION[uname]'");
		$con->query("INSERT INTO messages VALUES('Password Changed successfully!!!')");
		$con->close();
		header("location:homePage.php");
	}
	$con->close();
?>

			
