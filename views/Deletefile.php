<html>
<head>
<link rel="shortcut icon" href="icons/mkdirIcon.png">
<style type="css/text">
body
{margin-left:1000px;}
</style>
<h1><center><span style="display:inline;">Delete Directory or File</center></h1>
</head>
<title>Delete</title>
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
<h6 align="right"><a href="../controllers/logout.php">
<input type="submit" style="design:inline" value="Logout"></a>
<a href="../controllers/homePage.php"><input type="submit" value="Home"></a></h6>
<br><br><br><body bgcolor=#cfcfcf alink="#ee0000" link="#0000ee" vlink="#551a8b">
<form action="../controllers/Deletefile.php" method="post" >
<fieldset>
<?php
	exec("find /var/www/repos/".$_SESSION['project'],$temp);
	$i=0;
	foreach($temp as &$filename)
	{
		if($i!=0 and $i!=1)
		{
			echo "<input type=\"checkbox\" name=\"files[]\" value=\"".substr($filename,21)."\" />".substr($filename,21)."<br />";
		}	
		$i++;
	}
	echo "<input type=submit value=\"Delete\">";
	echo "</form>";
//Enter Directory or file name:<input type="text" name="filename"><br>
//</form>
?>
</body>
</html>
