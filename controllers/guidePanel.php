<?php
	session_start();
	if(!isset($_SESSION['uname']) || $_SESSION['uname']!=$_SESSION['projectName'])
		header("location:/views/loginwrong.html");
	if($_POST['target']=='currentVersion.php')
		header("location:/views/currentVersion.php");
	if($_POST['target']=='checkout.php')
		header("location:/views/checkout.php");
	$target="/views/$_POST[target]";
	require_once("../classes/common.class.php");
	$page=new page("Commits So far");
	chdir("/var/www/repos/$_SESSION[projectName]");
	exec("git log --all --graph --pretty=short --decorate",$out);
	$regex='/[0-9a-f]{7}/i';
	$i=0;
	echo "<font color=blue>";
	foreach($out as &$tmp)
	{
		if(preg_match($regex,$tmp,$matches))
		{
			echo "<a href=$target>$tmp</a><br>";
			$_SESSION['version']=$matches[0];
		}
		else
			echo $tmp."<br>";
	}
	echo "</font";
?>

