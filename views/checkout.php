<?php
	session_start();
	include("../config.php");
	require_once("../classes/database.class.php");
	$con=new Database;
	if($con->checkCookie($_SESSION['sessionID'],$_SESSION['uname'])==0)
	{
		$con->close();
		header("location:loginwrong.html");
	}
	$reply=$con->query("SELECT Date FROM Contributions WHERE Contribution='$_GET[version]'");
	$row=mysql_fetch_assoc($reply);
	chdir($GIT_ROOT);
	exec("git log $_GET[version]",$out);
	$commitMessage='';
	foreach($out as $tmp)
	{
		$tmp=trim($tmp);
		if($tmp=='EOC')
			break;
		$commitMessage=$commitMessage.$tmp."<br>";
	}
	echo "
	<html>\n
	<body bgcolor=#cfcfcf>\n
	<h6 align=right><a href=../controllers/logout.php>\n
	<input type=submit value=Logout style=display:inline></a>\n
	<a href=guide.php><input type=submit value=Home style=display:inline></a></h6>\n
	<font face=ubuntu>\n
		<h1>Commit ID :$_GET[version]</h1>\n
		<h3>Committed on $row[Date]</h3>\n
		Commit Message:\n
		$commitMessage<br>\n
		<a href=../controllers/gitCommands/checkout.php?version=$_GET[version]>\n
			<input type=submit value='Download This Version' style=height:25px>\n
		</a>\n
	</font>\n
	</body>\n
	</html>\n
	";
?>
