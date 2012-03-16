<?php
	session_start();
	require_once("../classes/database.class.php");
	require_once("../classes/common.class.php");
	$page=new page(substr($_GET['filename'],2+2*strlen($_SESSION['projectName'])));
	$con=new Database;
	if($con->checkCookie($_SESSION['sessionID'],$_SESSION['uname'])==0)
	{
		$con->close();
		header("loginwrong.html");
	}
	$con->close();
	require_once("../classes/file.class.php");
	$file = new File("/var/www/repos/".$_GET['filename']);
	$file->download_button();
	$file->show_file();
	$file->download_button();
?> 
</body>
</html>
