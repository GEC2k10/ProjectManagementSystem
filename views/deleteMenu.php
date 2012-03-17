<?php
	session_start();
	require_once("../classes/database.class.php");
	$con=new Database;
	if (!isset($_SESSION['uname']) || $_SESSION['uname']==$_SESSION['projectName'])
		header("location:/views/loginwrong.html");
	$con->messageDump();
	$con->close();
	echo "
	<html>\n
	<h6 align=right>
		<a href=../controllers/logout.php>\n
		<input type=submit value=Logout style=display:inline>\n
		</a>\n
		<a href=../controllers/homePage.php>\n
		<input type=submit value=Home style=display:inline>\n
		</a>\n
	</h6>\n
	<h1>Delete What?</h1>\n
	<body bgcolor=#cfcfcf>\n
	<font face=ubuntu>\n
	<form action=Deletefile.php method=post>\n
		<input type=radio value=1 name=mode CHECKED >Directories<br>\n
		<input type=radio value=2 name=mode>Files<br>\n
		<input type=radio value=3 name=mode>Recursive Listing<br>\n
		<input type=submit value=List>\n
	</form>\n
	</font>\n
	</body>\n
	</html>";
?>
