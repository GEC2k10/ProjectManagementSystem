<html>
<style type="text/css">
body {
	background-color:#cfcfcf;
} 
</style>
<head></head>
<body>
<form method=post action=../controllers/homePage.php >
       <div style='top:1px;left:1200px;position:absolute'>
       <input type=submit value=Home>
       </div>
</form>
<?php
	session_start();
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
	$file = new File("/var/www/repos/".$_GET['filename']);
	$file->show_file();
	$file->show_contribution_dates("/var/www/repos/".$_GET['filename'],$_GET['uname']);
?> 
</body>
</html>
