<html>
<style type="text/css">
body {
	background-color:#cfcfcf;
} 
</style>
<head></head>
<body>
<form method=post action=../controllers/homePage.php >
       <div style='top:1px;right:10px;position:absolute'>
       <input type=submit value=Home>
       </div>
</form>
<?php
	session_start();
	include("../config.php");
	require_once("../classes/database.class.php");
	$con=new Database;
	if($con->checkCookie($_SESSION['sessionID'],$_SESSION['uname'])==0)
	{
		$con->close();
		header("loginwrong.html");
	}
	$con->close();
	require_once("../classes/file.class.php");
	echo "<br/><h3>File :".$_GET['filename']."</h3>";
	$file = new File($PROJECT_ROOT.$_GET['filename']);
	$file->download_button();
	$file->show_file();
	$file->download_button();
?> 
</body>
</html>
