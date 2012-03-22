<?php
	session_start();
	include("../config.php");
	require_once("../classes/database.class.php");
	require_once("../classes/common.class.php");
	$page=new page("Commit details");
	$con=new Database;
	if (!isset($_SESSION['uname']) || $_SESSION['uname']!=$_SESSION['projectName'])
		header("location:/views/loginwrong.html");
	$version=mysql_real_escape_string($_GET['version']);
	$reply=$con->query("SELECT Date FROM Contributions WHERE Contribution='$version'");
	$row=mysql_fetch_assoc($reply);
	chdir($GIT_ROOT);
	exec("git log $_GET[version]",$out);
	$commitMessage='';
	foreach($out as $tmp)
	{
		$tmp=trim($tmp);
		if($tmp=='EOC')
			break;
		$commitMessage=$commitMessage.$tmp."<br>";
	}
	echo "
		<h2>Commit ID :$_GET[version]</h2>\n
		<h3>Committed on $row[Date]</h3>\n
		Commit Message:\n
		$commitMessage<br>\n
		<a href=../controllers/gitCommands/checkoutDownload.php?version=$_GET[version]>\n
			<input type=submit value='Download This Version' style=height:25px>\n
		</a>\n
		<a href=branch.php?version=$_GET[version]>\n
			<input type=submit value='Create a new branch' style=height:25px>\n
		</a>\n
	</body>\n
	</html>\n
	";
?>
