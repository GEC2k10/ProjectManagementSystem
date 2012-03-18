<html>
	<head>
		<link rel="shortcut icon" href="../views/icons/home.png">
	</head>
	<?php
	require_once("../classes/database.class.php");
	$con=new Database();
	session_start();
	if ($con->checkCookie($_SESSION['sessionID'],$_SESSION['uname'])==0)
	{
		$con->close();
		header("location:../views/loginwrong.html");
	}
	$con->messageDump();
	?>
	<body bgcolor=#cfcfcf>
		<font face='Ubuntu'>
			Suggestions
			<form name='suggestions' action='../controllers/Suggestions.php' method='post'>
			<textarea rows=10 cols=50 name="suggestion">
			</textarea>
			<input type='submit' value='submit'>
			</form>
		</font>

	</body>
</html>

