<?php
	session_start();
	include("$_SERVER[DOCUMENT_ROOT]/config.php");
	require_once("../classes/common.class.php");
	if (!isset($_SESSION['uname']) || $_SESSION['uname']!=$_SESSION['projectName'])
		header("location:/views/loginwrong.html");
	$page=new page("Switch branches");
	chdir($GIT_ROOT);
	exec("git branch -a",$out);
	echo "<h2>Please select a branch </h2>";
	echo "<form action=/controllers/gitCommands/checkout.php method=post>";
	foreach($out as &$tmp)
	{
		if($tmp[0]!='*')
			echo "<input type=radio value=$tmp name=branch checked>$tmp<br>";
		else
		{
			$tmp=substr($tmp,1);
			echo "&nbsp;&nbsp;<b>$tmp</b>(current)<br>";
		}
	}
	echo "<input type=submit value='Switch branch'>";
?>
