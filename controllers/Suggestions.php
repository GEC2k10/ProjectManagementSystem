<html>
<?php
	require_once("../classes/database.class.php");
	session_start();
	$con=new Database();
	if ($con->checkCookie($_SESSION['sessionID'],$_SESSION['uname'])==0)
	{
		$con->close();
		header("location:../views/loginwrong.html");
	}
	$con->messageDump();
	$query="INSERT into Suggestions value(\"".$_SESSION['uname']."\",\"".$_POST['suggestion']."\")";
	$con->query($query);
	header("location:homePage.php");
?>
</html>
