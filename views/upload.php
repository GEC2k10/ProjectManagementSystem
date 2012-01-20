<html>
<head>
<link rel="shortcut icon" href="icons/UpIcon.png">
<style type="css/text">
body
{margin-left:1000px;}
</style>
</head>
<title>Upload</title>

<?php
	session_start();
	require_once("../classes/database.class.php");
	$con=new Database;
	if ($con->checkCookie($_SESSION['sessionID'],$_SESSION['uname'])==0)
	{
		$con->close();
		header("location:login.html");
	}
	$con->close();
?>

<h6 align="right"><a href="../controllers/logout.php">
<input type="submit" value="Logout" style="display:inline"></a>
<a href="../controllers/homePage.php"><input type="submit" value="Home" style="display:inline"></a></h6>
<body bgcolor=#cfcfcf alink="#ee0000" link="#0000ee" vlink="#551a8b">
<h1><center>Upload your files</h1></center>
<br><br>

<form method='post' action='mkdir.php' style="display:inline">
	<div style="top:90px;left:0px;position:absolute">
		<input type='image' src='icons/mkdir.png' value='New Directory'>
		<div style="top:90px;left:10px;position:absolute">
			<font face='Ubuntu' size='2' >New directory</font>
		</div>
	</div>
</form>

<form method='post' action='Deletefile.php' >
	<div style="top:90px;left:150px;position:absolute">
		<input type='image' src='icons/delete.jpg' value='New Directory'>
		<div style="top:90px;left:35px;position:absolute">
			<font face='Ubuntu' size='2' >Delete</font>
		</div>
	</div>
</form>

<br><br><br>

<form action="../controllers/gitCommands/upload.php" method="post" enctype="multipart/form-data">
<fieldset>
<i><u>Select files to upload:<br><br>
<input type='file' name='file[]' multiple><br><br>
Select target:</i></u><br>

<?php
	exec("find /var/www/repos/$_SESSION[projectName]/  \( ! -regex '.*/\..*' \) -type d ",$out);
	foreach ($out as &$tmp)
	{
		$sub=substr($tmp,15+strlen($_SESSION['projectName']));
		if(strcmp($tmp,$out[0])==0)
			echo "<input type='radio' name='directory' value='$tmp' CHECKED/>$sub<br>";
		else
			echo "<input type='radio' name='directory' value='$tmp'/>$sub<br>";
	}
?>

<input type="submit" value="Upload" >
</form>
</body>
</html>
