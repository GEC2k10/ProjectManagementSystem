<html>
<?php
	$con=mysql_connect("localhost","root","password");
	mysql_select_db("GitRepo");
	$query="UPDATE Accounts SET sessionID=\"0\" where uname='$row[uname]'";
	session_start();
	$_SESSION['username']=0;
	$_SESSION['SessionID']=0;
	header('location:../views/login.html');
?>
</html>

