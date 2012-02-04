<?php
session_start();
chdir("/var/www/repos/");
exec("zip -r ../downloads/$_SESSION[sessionID].zip $_SESSION[projectName]");
chdir("/var/www/downloads/");
header( "Content-Disposition: attachment; filename=$_SESSION[sessionID].zip" ); 
readfile("$_SESSION[sessionID].zip");
?>

