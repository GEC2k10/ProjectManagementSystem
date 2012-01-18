<html>
<head></head>
<body>
<?php
require_once("../classes/showfile.class.php");
echo "<h3>File :".$_GET['filename']."</h3>";
$file = new ShowFile("/var/www/repos/".$_GET['filename']);
$file->show_file();
$file->show_contribution_dates("/var/www/repos/".$_GET['filename'],$_GET['uname']);
?>
</body>
</html>


