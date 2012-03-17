<?php
	session_start();
	require_once("../classes/common.class.php");
	require_once("../classes/file.class.php");
	if (!isset($_SESSION['uname']))
		header("location:/views/loginwrong.html");
	$page=new page(substr($_GET['filename'],16+2*strlen($_SESSION['projectName'])));
	$file = new File("/var/www/repos/".$_GET['filename']);
	$file->download_button();
	$file->show_file();
	$file->download_button();
?> 
</body>
</html>
