<?php
	session_start();
	require_once("../classes/database.class.php");
	require_once("../classes/common.class.php");
	$page=new page("Switch branches");
	$con=new Database;
	if($con->checkCookie($_SESSION['sessionID'],$_SESSION['uname'])==0)
	{
		$con->close();
		header("location:loginwrong.html");
	}
	chdir("/var/www/repos/$_SESSION[projectName]/");
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






