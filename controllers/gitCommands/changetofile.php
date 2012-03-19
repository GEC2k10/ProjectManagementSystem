<html>
<body bgcolor=#cfcfcf>
<font face=ubuntu >
<h2>
Changes to file <?php echo $_GET['filename'];?><br/>
</h2>
</font>
<font face=ubuntu >
<?php 
	require_once("../../classes/common.class.php");
	new page;
	include("../../config.php");
	session_start();
	require_once("../../classes/database.class.php");
	if (!isset($_SESSION['uname']) || $_SESSION['uname']=='admin')
		header("location:/views/loginwrong.html");
	chdir($GIT_ROOT);
	$file=$_SESSION['projectName']."/".$_GET['filename'];
	exec("git diff $file",$row);
	echo "<fieldset>";
	foreach($row as &$temp)
	{
		echo htmlentities($temp); //htmlentities() used for displaying strings with angle barckets
		echo "<br/>";
	}
?>
</font>
</html>
