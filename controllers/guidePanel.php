<?php
	session_start();
	if(!isset($_SESSION['uname']) || $_SESSION['uname']!=$_SESSION['projectName'])
		header("location:/views/loginwrong.html");
	if($_POST['target']=='currentVersion.php')
		header("location:/views/currentVersion.php");
	if($_POST['target']=='checkout.php')
		header("location:/views/checkout.php");
	if($_POST['target']=='changesToFile.php')
		header("location:/views/changes.php");
	if($_POST['target']=='newFiles.php')
		header("location:/views/newFiles.php");
	$target="/views/$_POST[target]";
	require_once("../classes/common.class.php");
	$page=new page("Commits So far");
	chdir("/var/www/repos/$_SESSION[projectName]");
	exec("git log --all --graph --oneline --decorate",$out);
	$regex='/[0-9a-f]{7}/i';
	$i=0;
	echo "<font color=blue>";
	foreach($out as &$tmp)
	{
		if(preg_match($regex,$tmp,$matches))
			echo "<a href=$target?version=$matches[0]>$tmp</a><br>";
		else
			echo $tmp."<br>";
	}
	echo "</font";
?>

