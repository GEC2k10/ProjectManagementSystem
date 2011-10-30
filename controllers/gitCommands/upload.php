<html>
<title>Upload Files to the central Repository</title>
<?php
	session_start();
<<<<<<< HEAD
	$_SESSION['message']=' ';
	$target=$_POST['directory'].'/';
	$target=$target.basename($_FILES['file']['name']);
=======
	$target="/var/www/lag/controllers/gitCommands/repos/".$_SESSION['project']."/";
	$_SESSION['message']=' ';
	$target=$_POST['directory'].'/';
>>>>>>> 06103d65fda4a0f51c182cc081495ed732a23db2
	echo $target;
	$target=$target.basename($_FILES['file']['name']);
	move_uploaded_file($_FILES['file']['tmp_name'],$target);
<<<<<<< HEAD
	header("location:../homePage.php");
	echo "<br><br><a href='../homePage.php'>Click here to go to homepage</a>";
=======
	header("location:../../views/upload.php");
>>>>>>> 06103d65fda4a0f51c182cc081495ed732a23db2
?>
</html>
