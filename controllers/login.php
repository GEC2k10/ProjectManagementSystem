<html><body style="background-image: url(../views/images.png); color: rgb(0, 0, 0);" alink="#ee0000" link="#0000ee" vlink="#551a8b">
<br><br><br><br><center>
<?php
$con=mysql_connect("localhost",'root','root-user');
if(!$con)
{
	echo "fail";
}
mysql_select_db("GitRepo");
$query = sprintf("SELECT * FROM Accounts WHERE uname='%s' AND passwd='%s'",
	mysql_real_escape_string($_POST['uname']),
	mysql_real_escape_string(sha1($_POST['passwd'])));
$reply=mysql_query($query,$con);
mysql_close($con);
$row=mysql_fetch_assoc($reply);
if($row['uname']=="")
{
	echo "Incorrect user name or password ";
        header("Location:/lag/views/loginwrong.html");
	exit;
}
else 
{
	session_start();
	$_SESSION['username']=$row['uname'];
	if($row['activationStatus']=='0')
	{
		header("Location:../views/activate.html");
	}
	else
	{
	header("Location:homePage.php");
	}
}
?>
</body>
</html>
