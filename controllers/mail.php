<?php
	session_start();
	require_once("../classes/database.class.php");
	require_once("../classes/mail.class.php");
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


?>
