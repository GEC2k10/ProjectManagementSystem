<html><body style="background-image: url(../views/images.png); color: rgb(0, 0, 0);" alink="#ee0000" link="#0000ee" vlink="#551a8b">
<br><br><br><br><center>
<?php
$con=mysql_connect("localhost",'root','root-user');
mysql_select_db("GitRepo");
$query = sprintf("SELECT * FROM Accounts WHERE uname='%s' AND passwd='%s'",
	mysql_real_escape_string($_POST[uname]),
	mysql_real_escape_string(sha1($_POST[passwd])));
$reply=mysql_query($query,$con);
$row=mysql_fetch_assoc($reply);
if($row['uname']=="")
{
	echo "Incorrect user name or password "; 
	exit;
}
else 
{

	$query="update Accounts set loginStatus='1',sessionID='0' where uname='".$row['uname']."'";
 	mysql_query($query,$con);
	mysql_close($con);
	session_start();
	$_SESSION['username']=$row['uname'];
	header("Location:homePage.php");
}
?>
</body>
</html>
