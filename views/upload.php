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
	echo $_SESSION['message'];
	$_SESSION['message']='';
        $con=mysql_connect("localhost",'root','password');
        mysql_select_db("GitRepo");
        $query = "SELECT * FROM Accounts WHERE sessionID='".$_SESSION['SessionID']."'";
//Selects row that matches sessionId of current session.The session ID was written into the database in the login page.
        $reply=mysql_query($query,$con);
        if(!mysql_num_rows($reply))
        {
//	prevent unautorized acess using homepage security
		header("location:../controllers/homePage.php");
        }
?>
<h6 align="right"><a href="../controllers/logout.php"><input type="submit" value="Logout" style="display:inline"></a>
<a href="../controllers/homePage.php"><input type="submit" value="Home" style="display:inline"></a></h6>
<br><br><br><body style="background-image: url(images.png); color: rgb(0, 0, 0);" alink="#ee0000" link="#0000ee" vlink="#551a8b">
<h1><span style="color: white;">Upload a file</h1>
<form action="../controllers/gitCommands/upload.php" method="post" enctype="multipart/form-data">
<fieldset>
<span style="color: white;">
<input type='file' name='file'><br>
Select target:<br>
<?php
	exec("find /var/www/repos/$_SESSION[project]/  \( ! -regex '.*/\..*' \) -type d ",$out);
	foreach ($out as &$tmp)
	{
		$sub=substr($tmp,15+strlen($_SESSION['project']));
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
