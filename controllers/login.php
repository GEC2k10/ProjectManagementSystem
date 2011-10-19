<html><body style="background-image: url(../views/images.png); color: rgb(0, 0, 0);" alink="#ee0000" link="#0000ee" vlink="#551a8b">
<br><br><br><br><center>
<?php
/***********************************************************
This script is the backend of the login.html page.The script in this page does all the login related actions like verify password,set session ID etc.
***********************************************************/
$con=mysql_connect("localhost",'root','password');
mysql_select_db("GitRepo");
/*Lines 14,15,16:Selects all columns from the Accounts table of the GitRepo database.The input obtained from the users are "escaped" so as to avoid SQL injection.The query is executed and the returned handle is stored in $reply.
Note that only one row will be returned as result of the query as the uname is the primary key
*/
$query = sprintf("SELECT * FROM Accounts WHERE uname='%s' AND passwd='%s'",
	mysql_real_escape_string($_POST['uname']),
	mysql_real_escape_string(sha1($_POST['passwd'])));
$reply=mysql_query($query,$con);
$row=mysql_fetch_assoc($reply);
if($row['uname']=="")
{
//Redirect to loginWrong.html if no row mathes the query,ie,uname wrong or password wrong.
	echo "Incorrect user name or password ";
        header("Location:/lag/views/loginwrong.html");
	exit;
}
else 
{
	session_start();
	$SessionID="";
	for($i=0;$i<40;$i++)
	{
	// Creating a 40 character long session ID
		$j=rand(0,2);
		if($j==0)
			$SessionID.=chr(rand(65,90));
		else if($j==1)
			$SessionID.=chr(rand(97,122));
		else 
			$SessionID.=chr(rand(48,57));
	}

	$_SESSION['SessionID']=$SessionID;
<<<<<<< HEAD
        $_SESSION['username']=$row['uname'];
=======
	$_SESSION['project']=$row['project'];
>>>>>>> 95d871bb34a0a25b8abb4dc7847a2bb55cc76f12
//defined session ID for current user's current session
	$query="UPDATE Accounts SET sessionID=\"".$SessionID."\" where uname='$row[uname]'";
//Saved generated Session ID to database so that it can be used as a key in other pages of the same session
	mysql_query($query,$con);
	mysql_close($con);
	if($row['activationStatus']=='0')
		header("Location:../views/activate.html");
	else
		header("Location:homePage.php");
//If password has been changed,then activationStatus=1,hence redirect to user's homepage
//Redirect to activate.html,if the user has not done the first password change,which is mandatory as the password will be availabe at sent items folder of the group mail ID
}
?>
</body>
</html>
