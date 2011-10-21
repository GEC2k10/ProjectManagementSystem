<html>
<head>
<style type="css/text">
body
{margin-left:1000px;}
</style>
</head>
<title>Upload</title>
<form method="post" action="../controllers/logout.php">
<input type="submit" value="Logout">
</form>
<br><br><br><body style="background-image: url(images.png); color: rgb(0, 0, 0);" alink="#ee0000" link="#0000ee" vlink="#551a8b">
<h1><span style="color: white;">Upload a file</h1>
<form action="../controllers/gitCommands/upload.php" method="post" enctype="multipart/form-data">
<fieldset>
<span style="color: white;">
<input type='file' name='file'><br>
Select target:<br>
<?php
	session_start();
	exec("find /var/www/repos/$_SESSION[project]/  \( ! -regex '.*/\..*' \) -type d ",$out);
	foreach ($out as &$tmp)
{		echo "<input type='radio' name='directory' value='$tmp'/>$tmp<br>";}
?>
<input type="submit" value="Upload" >
</form>
</body>
</html>
