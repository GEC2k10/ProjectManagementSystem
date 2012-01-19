<html>
<style type="text/css">
body {
	background-color:#cfcfcf;
} 
</style>
<head></head>
<body>
<?php
session_start();
if (!isset($_SESSION['projectName']) ) {   //Security Check
header("Location:../views/login.html");
}
require_once("../classes/showfile.class.php");
echo "<br/><h3>File :".$_GET['filename']."</h3>";
$file = new ShowFile("/var/www/repos/".$_GET['filename']);
$file->show_file();
$file->show_contribution_dates("/var/www/repos/".$_GET['filename'],$_GET['uname']);
?> 
<form method=post action=../controllers/homePage.php >
       <div style='top:1px;left:1200px;position:absolute'>
       <input type=submit value=Home>
       </div>
</form>
</body>
</html>
