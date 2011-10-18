<html>
<title>Upload Files to the central Repository</title>
<?php
	session_start();
	$_SESSION['message']=' ';
	$target=$_POST['directory'].'/';
	$target=$target.basename($_FILES['file']['name']);
	echo $target;
	move_uploaded_file($_FILES['file']['tmp_name'],$target);
	echo "<br><br><a href='../homePage.php'>Click here to go to homepage</a>";
?>
</html>
