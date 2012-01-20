<html>
<head>
<link rel="shortcut icon" href="icons/mkdirIcon.png">
<style type="css/text">
body
{margin-left:1000px;}
</style>
<h1><center><span style="display:inline;">New Directory</center></h1>
</head>
<title>Create Directory</title>
<?php
	session_start();
	require_once("../classes/database.class.php");
	$con=new Database;
	if($con->checkCookie($_SESSION['sessionID'],$_SESSION['uname'])==0)
	{
		$con->close();
		header("location:loginwrong.html");
	}
	$con->close();
?>
<h6 align="right"><a href="../controllers/logout.php"><input type="submit" style="design:inline" value="Logout"></a>
<a href="../controllers/homePage.php"><input type="submit" value="Home"></a></h6>
<br><br><br><body bgcolor=#cfcfcf alink="#ee0000" link="#0000ee" vlink="#551a8b">
<form action="../controllers/mkdir.php" method="post" >
<fieldset>
Enter Directory name:<input type="text" name="dirName"><br>
Select target:<br>
<?php
	exec("find /var/www/repos/$_SESSION[projectName]/  \( ! -regex '.*/\..*' \) -type d ",$out);
	foreach ($out as &$tmp)
	{
		$sub=substr($tmp,15+strlen($_SESSION['projectName']));
		if(strcmp($out[0],$tmp)==0)
			echo "<input type='radio' name='directory' value='$tmp' CHECKED/>$sub<br>";
		else
			echo "<input type='radio' name='directory' value='$tmp'/>$sub<br>";
	}
?>
<input type="submit" value="Create Directory" >
</form>
</body>
</html>
