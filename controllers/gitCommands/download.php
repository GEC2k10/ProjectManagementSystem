<?php
include("../../config.php");
session_start();
chdir($REPO);
exec("zip -r ../downloads/$_SESSION[sessionID].zip $_SESSION[projectName]");
chdir($DOWNLOAD);
header( "Content-Disposition: attachment; filename=$_SESSION[sessionID].zip" ); 
readfile("$_SESSION[sessionID].zip");
?>

