<?php
session_start();
exec("tar -cf /var/www/downloads/$_SESSION[SessionID].tar /var/www/repos/$_SESSION[project]");
header( 'Content-type: application/x-gzip-compressed' );    // sets content type
header( 'Content-Disposition: attachment; filename="/var/www/downloads/download.tar" '); // replace filenamemask  with name with which you  allowed to download the file      
header( 'Content-transfer-encoding: binary' );        //sets encoding
header( 'Content-Length: '.filesize("filename") );    // replace filename with file yu want to alow to download
readfile( "filename" );  // repeat the same here
?>

