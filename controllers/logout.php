<html>
<?php
	session_start();
	$con=mysql_connect("localhost",'root','password');
	mysql_select_db("GitRepo");
	$query = "UPDATE Accounts SET sessionID='0' WHERE sessionID='$_SESSION[SessionID]'";
	$reply=mysql_query($query,$con);
	session_destroy();
	mysql_close();
	//redirect to login page
	header('location:../views/login.html');
?>
</html>

