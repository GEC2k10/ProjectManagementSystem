<html>
<?php
	session_start();
<<<<<<< HEAD
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
=======
	$_SESSION['message']=' ';

	$target=$target.$_POST['directory'];
	if($target[strlen($target)-1]!='/')
		$target=$target.'/';
>>>>>>> f71ea511c8b8655cf477eec1bfd4ac10e0ad83fb
	$target=$target.basename($_FILES['file']['name']);
	echo $target;
	if(move_uploaded_file($_FILES['file']['tmp_name'],$target))
		$_SESSION['message']="Successfully uploaded file".$_FILES['file']['name'];
<<<<<<< HEAD
>>>>>>> 1aa1c6310d4bcda2112105ac3a328e786a787034
=======
	else
		echo "failed";
>>>>>>> f71ea511c8b8655cf477eec1bfd4ac10e0ad83fb
	header("location:../../views/upload.php");
>>>>>>> 06103d65fda4a0f51c182cc081495ed732a23db2
?>
</html>
