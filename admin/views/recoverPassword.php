<?php
	session_start();
	require_once("../../classes/database.class.php");
	require_once("../../classes/common.class.php");
	$con=new Database;
	$page=new page("Recover Lost Password");
	if($con->checkCookie($_SESSION['sessionID'],'admin')==0)
	{
		$con->close();
		header("Location:views/loginwrong.html");		
	}
	$con->close();
	$page="
	<form action=/admin/controllers/reset.php method=post>
	Username <input type=text name=uname><br><br>
	Password <input type=password name=passwd><br><br>
	<input type=submit value='Reset Password'>
	</body>
	</html>";
	echo $page;
?>
