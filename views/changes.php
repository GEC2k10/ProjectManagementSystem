<?php 
	require_once("$_SERVER[DOCUMENT_ROOT]/classes/common.class.php");
	include("$_SERVER[DOCUMENT_ROOT]/config.php");
	if($_SESSION['uname']!=$_SESSION['projectName'])
		header("location:/views/loginwrong.html");
	new page("Modified Files in Current Version");
	echo "This following are the files that changed in the current version.<br>
	Please note that the new files are not listed.For the list of 
	new files <a href=newFiles.php>click here.</a><br><br>";
	session_start();
	if (!isset($_SESSION['uname']) || $_SESSION['uname']=='admin')
		header("location:/views/loginwrong.html");
	chdir($GIT_ROOT);
	exec("git diff --name-only",$row);
	if($row==NULL)
		echo "<br><br>No Modified files!!!";
	else
		foreach($row as &$temp)
		{
			echo "<a href=/controllers/gitCommands/changesToFile.php?filename=";
			echo substr($temp,strlen($_SESSION['projectName'])+1).">";
			echo substr($temp,strlen($_SESSION['projectName'])+1)."</a><br>";
		}
?>
