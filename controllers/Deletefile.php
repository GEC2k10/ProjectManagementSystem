<?php
session_start();
require_once("/var/www/lag/classes/file.class.php");
$files=$_POST['files'];
$limit=count($files);
for($i=0;$i<$limit;$i++)
{
	echo $files[$i]."<br />";
	$file=new File("/var/www/repos/".$_SESSION['projectName']."/".$files[$i]);
	$file->Delete($files[$i]);
}
?>
