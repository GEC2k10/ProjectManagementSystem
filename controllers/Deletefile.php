<?php
session_start();
require_once("/var/www/lag/classes/file.class.php");
$file=new File("/var/www/repos/".$_SESSION['project']."/".$_POST['filename']);
$file->Delete($_POST['filename']);
?>
