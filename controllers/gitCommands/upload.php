<html>
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
<<<<<<< HEAD
>>>>>>> 06103d65fda4a0f51c182cc081495ed732a23db2
	echo $target;
	$target=$target.basename($_FILES['file']['name']);
	move_uploaded_file($_FILES['file']['tmp_name'],$target);
<<<<<<< HEAD
	header("location:../homePage.php");
	echo "<br><br><a href='../homePage.php'>Click here to go to homepage</a>";
=======
=======
	$target=$target.basename($_FILES['file']['name']);
	if(move_uploaded_file($_FILES['file']['tmp_name'],$target))
		$_SESSION['message']="Successfully uploaded file".$_FILES['file']['name'];
>>>>>>> 1aa1c6310d4bcda2112105ac3a328e786a787034
	header("location:../../views/upload.php");
>>>>>>> 06103d65fda4a0f51c182cc081495ed732a23db2
?>
</html>
