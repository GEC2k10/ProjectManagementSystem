<?php
header( 'Content-type: application/x-gzip-compressed' );    // sets content type
header( 'Content-Disposition: attachment; filename="filenamemask"' ); // replace filenamemask  with name with which you  allowed to download the file      
header( 'Content-transfer-encoding: binary' );        //sets encoding
header( 'Content-Length: '.filesize("filename") );    // replace filename with file yu want to alow to download
readfile( "filename" );  // repeat the same here
?>

