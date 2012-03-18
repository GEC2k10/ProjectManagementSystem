<?php
	session_start();
	require_once("../../classes/database.class.php");
	require_once("../../classes/mail.class.php");
	$con=new Database;
	if($_SESSION['uname']!='admin')
		header("Location:/views/loginwrong.html");		
	$query="INSERT INTO Accounts VALUES('%s','%s','%s','%s','%s','')";
	for($i=0;$i<10;$i++)
	{
		if(strlen($_POST["uname$i"])==0)
			break;
		$passwd=substr(sha1(rand(1,10000)),0,8);
		$con->query(sprintf($query,mysql_escape_string($_POST["uname$i"]),
			mysql_escape_string($_POST["name$i"]),
			sha1($passwd),
			mysql_escape_string($_POST["project$i"]),
			mysql_escape_string($_POST["email$i"])));
		$user=new email(1,$_POST["uname$i"],$passwd);
		$user->sendMail($_POST["email$i"]);
		$project=$_POST["project$i"];
		mkdir("/var/www/repos/$project/",0777);
		mkdir("/var/www/repos/$project/$project/",0777);
		chdir("/var/www/repos/$project/");
		exec("git init");
	}
	header("location:/admin/views/adminHome.php");
?>
