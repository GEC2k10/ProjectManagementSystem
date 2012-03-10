<html>
	<head>
		<link rel="shortcut icon" href="../views/icons/home.png">
	</head>
	<?php
	require_once("../classes/database.class.php");
	require_once("../classes/common.class.php");
	$con = new Database();
	session_start();
	if ($con->checkCookie($_SESSION['sessionID'],$_SESSION['uname'])==0)
	{
		$con->close();
		header("location:../views/loginwrong.html");
	}
	else if($_SESSION['uname']==$_SESSION['projectName'])
	{
		$con->close();
		header("location:../views/guide.php");
	}
	$con->messageDump();
	$_SESSION['message']=''; 
	?>
						<?php $page=new page("Welcome $_SESSION[uname]");?>
		<font size="6">
			Project name :<?php echo  $_SESSION['projectName']; ?>
		</font><br><br>
		<form method=post action=../views/upload.php style=display:inline>
			<div style='top:200px;left:50px;position:absolute'>
				<input type=image src=../views/icons/upload.png value=Upload a file style=display:inline>
			</div>
		</form>
		<form method=post action=gitCommands/download.php style=display:inline>
			<div style='top:200px;left:300px;position:absolute'>
				<input type=image src=../views/icons/download.png value='Download all files'><br>
			</div>
		</form>
	<font size='4'>
	<div style='top:360px;left:90px;position:absolute'>
		Modify Project	
	</div>
	<div style='top:360px;left:360px;position:absolute'>
		Download
	</div>
	<div style='top:420px;position:absolute'>
		<a href=../views/recentContributions.php>View Files in Current Version</a><br>
		<a href=../views/changePassword.php>Change Account Password</a>
	</div>
	<div style='bottom:0px;position:absolute'>
	<h6>Copyright(c).All Rights Reserved.GEC TCR LAG 2010-2014</h6></div>
	</body>
	</font>
</html>
