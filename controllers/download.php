<?php
	$file=$_POST['file'];
	$file=substr($file,strrpos($file,'/'));
	header( "Content-Disposition: attachment; filename=$file" ); 
	readfile("$_POST[file]");
?>

