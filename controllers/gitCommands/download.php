<?php
session_start();
//exec("tar -zcf /var/www/downloads/$_SESSION[SessionID].tgz /var/www/repos/$_SESSION[project]");
exec("tar -zcf /var/www/downloads/download.tgz /var/www/repos/$_SESSION[project]");
header( 'Content-Type: application/octet-stream' );    // sets content type
header( 'Content-Disposition: attachment; filename="/var/www/downloads/download.tgz" '); // replace filenamemask  with name with which you  allowed to download the file      
header( 'Content-transfer-encoding: binary' );        //sets encoding
header( 'Content-Length: '.filesize("filename") );    // replace filename with file yu want to alow to download
readfile("filename" );  // repeat the same here
?>

