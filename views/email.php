<?php
	include("$_SERVER[DOCUMENT_ROOT]/config.php");
	require_once("$_SERVER[DOCUMENT_ROOT]/classes/common.class.php");
	if($_SESSION['uname']!=$_SESSION['projectName'])
		header("location:/views/loginwrong.html");
	$page=new page("Email the group");
	echo "
		<form action=/controllers/mail.php method=post style=left:30px;position:absolute>
			<h3>Subject:</h3>
			<input type=text name=subject value=[APTS] size=60><br>
			<input type=hidden name=flag value=email>
			<h3>Enter the message</h3>
			<textarea name=message rows=20 cols=55>Enter your message here</textarea><br><br>
			<input type=submit value=Email>
		</form>
		";
?>
