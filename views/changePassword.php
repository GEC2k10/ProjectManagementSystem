<?php
	session_start();
	require_once("../classes/database.class.php");
	$con=new Database;
	if($con->checkCookie($_SESSION['sessionID'],$_SESSION['uname'])==0)
	{
		$con->close();
		header("location:loginwrong.html");
	}
	$con->close();
	echo "
	<html>
	<h6 align=right>
		<a href=../controllers/logout.php>\n
		<input type=submit value=Logout style=display:inline>\n
		</a>\n
		<a href=../controllers/homePage.php>\n
		<input type=submit value=Home style=display:inline>\n
		</a>\n
	</h6>\n
	<body bgcolor=#cfcfcf>\n
	<font face=ubuntu>\n
	<h1>Change Password</h1>\n
	<form action=../controllers/changePassword.php method=post>\n
		Enter Current Password:<input type=password name=current style=left:200px;position:absolute><br><br>\n
		Enter New Password:<input type=password name=new style=left:200px;position:absolute><br><br>\n
		Repeat New Password:<input type=password name=repeat style=left:200px;position:absolute><br><br>\n
		<input type=submit value='Change Password'><br>\n
	</form>\n
	</font>\n
	</body>\n
	</html>\n
	";
?>
