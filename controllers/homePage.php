<html>
<?php
	session_start();
	$con=mysql_connect("localhost",'root','root-user');
	mysql_select_db("GitRepo");
	echo "<title>Homepage of ".$_SESSION['username']."</title>";
	$query = sprintf("SELECT * FROM Accounts WHERE uname='".$_SESSION['username']."'");
	$reply=mysql_query($query,$con);
	if (mysql_num_rows($reply)==0)
	{
		echo '<body style="background-image: url(../views/images.png); color: rgb(0, 0, 0);" alink="#ee0000" link="#0000ee" vlink="#551a8b">';
		echo "<h3>You are not logged in..Please Login...</h3>";
		echo "<br><a href='../views/login.html'><input type='submit' value='Login'></a>";
		exit;
	}
	$row=mysql_fetch_assoc($reply);
	if($row['activationStatus']=='0')
	{
		header("location:../views/activate.html");
	}
	mysql_close($con);
?>
<body style="background-image: url(../views/images.png); color: rgb(0, 0, 0);" alink="#ee0000" link="#0000ee" vlink="#551a8b">
<font face='Ubuntu'>
<left>Welcome <a href='profiles.php'><b><i><?php echo $row['uname'];?></a></b></i></left>
<a href='logout.php'><right>Logout</right></a><br>
<left><font size="4">Project name :</font><?php echo " ".$row['projectName']; ?></left>
<form method='post' enctype="multipart/form-data" action='gitCommands/upload.php'>
	<input type='file' name='file'>
	<input type='submit' value='git add'>
</form>
</font>
</body>
</html>
