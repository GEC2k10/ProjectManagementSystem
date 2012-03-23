<?php
	require_once("$_SERVER[DOCUMENT_ROOT]/classes/common.class.php");
	include("$_SERVER[DOCUMENT_ROOT]/config.php");
	if($_SESSION['uname']!=$_SESSION['projectName'])
		header("location:/views/loginwrong.html");
	new page("New Files in Current Version");
	chdir($GIT_ROOT);
	exec("git status --short",$out);
	foreach($out as &$tmp)
		if($tmp[0]=='?')
		{
			$file=substr($tmp,3+strlen($_SESSION['projectName']));
			echo "<a href=/views/showfile.php?filename=$file>$file</a><br>";
		}
?>
