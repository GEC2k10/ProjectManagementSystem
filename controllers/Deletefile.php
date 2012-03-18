<?php
session_start();
require_once("../classes/file.class.php");
$files=$_POST['files'];
foreach ($files as &$tmp)
{
	
	echo $tmp;
	$file=new File($tmp);
	$file->Delete($tmp);
	$file->__destruct();
}
header("location:../views/deleteMenu.php");
?>
