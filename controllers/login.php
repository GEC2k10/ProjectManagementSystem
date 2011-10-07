<html><body style="background-image: url(../views/images.png); color: rgb(0, 0, 0);" alink="#ee0000" link="#0000ee" vlink="#551a8b">
<br><br><br><br><center>
<?php
$con=mysql_connect("localhost",'root','password');
if(!$con)
{
	echo "fail";
}
mysql_select_db("GitRepo");
$query = sprintf("SELECT * FROM Accounts WHERE uname='%s' AND passwd='%s'",
	mysql_real_escape_string($_POST['uname']),
	mysql_real_escape_string(sha1($_POST['passwd'])));
$reply=mysql_query($query,$con);
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
	$SESSIONID="";
	for($i=0;$i<40;$i++)// Creating a 40 character long session ID
	{
		$j=rand(0,2);
		if($j==0)
		{
			$SESSIONID.=chr(rand(65,90));
		}
		else if($j==1)
		{
			$SESSIONID.=chr(rand(97,122));
		}
		else 
		{
			$SESSIONID.=chr(rand(48,57));
		}
	}
	$_SESSION['username']=$row['uname'];
	$_SESSION['SessionID']=$SESSIONID;
	$query="UPDATE Accounts SET sessionID=\"".$SESSIONID."\" where uname='$row[uname]'";
	mysql_query($query,$con);
	mysql_close($con);
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
