<html>
<head>
<link rel="shortcut icon" href="icons/mkdirIcon.png">
<style type="css/text">
body
{margin-left:1000px;}
</style>
<?php
	session_start();
	require_once("../classes/database.class.php");
	require_once("../classes/common.class.php");
	$page=new page("Create Directory");
	$con=new Database;
	if($con->checkCookie($_SESSION['sessionID'],$_SESSION['uname'])==0 || ($_SESSION['uname']==$_SESSION['projectName']))
	{
		$con->close();
		header("location:loginwrong.html");
	}
	$con->close();
?>
<form action="../controllers/mkdir.php" method="post" >
<fieldset>
<h3 style=display:inline>Enter Directory name:</h3>
<input type="text" name="dirName"><br>
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
