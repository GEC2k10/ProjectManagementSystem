<html>
<head></head>
<style type="text/css">
body {
	background-color:#cfcfcf;
} 
</style>
<body>
<?php
require_once("../classes/showusers.class.php");
echo "<h1 align =center>Contributor : ".$_GET['uname']."</h1>"; 
$user = new ShowUsers($_GET['uname']);
$user->show_files();
?>
</body>
</html>
