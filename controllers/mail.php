<?php
	session_start();
	if($_SESSION['uname']!=$_SESSION['projectName'])
		header("location:/views/loginwrong.html");
	require_once("$_SERVER[DOCUMENT_ROOT]/classes/database.class.php");
	require_once("$_SERVER[DOCUMENT_ROOT]/classes/mail.class.php");
	$con=new Database;
	if($_GET['flag']=='branch')
	{
		$mail=new email(2);
		$reply=$con->query("SELECT email FROM Accounts WHERE projectName='$_SESSION[projectName]' AND projectName!=uname");
		if($reply!=0)
			while($row=mysql_fetch_assoc($reply))
				$mail->sendMail($row['email']);
		header("location:/views/guide.php");
	}
	else if($_POST['flag']=='email')
	{
		$_SESSION['body']=$_POST['message'];
		$_SESSION['subject']=$_POST['subject'];
		$mail=new email(3);
		$reply=$con->query("SELECT email FROM Accounts WHERE projectName='$_SESSION[projectName]' AND projectName!=uname");
		if($reply!=0)
			while($row=mysql_fetch_assoc($reply))
				$mail->sendMail($row['email']);
		header("location:/views/guide.php");
	}
	else if($_GET['flag']=='commit')
	{
		$mail=new email(4);
		$reply=$con->query("SELECT email FROM Accounts WHERE projectName='$_SESSION[projectName]' AND projectName!=uname");
		if($reply!=0)
			while($row=mysql_fetch_assoc($reply))
				$mail->sendMail($row['email']);
		header("location:/views/guide.php");
	}
	header("location:/views/guide.php");

?>
