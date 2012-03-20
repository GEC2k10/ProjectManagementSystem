<?php
	session_start();
	include("$_SERVER[DOCUMENT_ROOT]/config.php");
	require_once("../classes/common.class.php");
	require_once("../classes/file.class.php");
	if (!isset($_SESSION['uname']))
		header("location:/views/loginwrong.html");
	$page=new page($_GET['filename']);
	$file = new File($PROJECT_ROOT.$_GET['filename']);
	$file->download_button();
	$file->show_file();
	$file->download_button();
?> 
</body>
</html>
