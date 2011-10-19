<html>
<title>Upload Files to the central Repository</title>
<?php
	session_start();
<<<<<<< HEAD
	$target="/var/www/lag/controllers/gitCommands/repos/".$_SESSION['username']."/";
=======
	$_SESSION['message']=' ';
	$target=$_POST['directory'].'/';
>>>>>>> 95d871bb34a0a25b8abb4dc7847a2bb55cc76f12
	$target=$target.basename($_FILES['file']['name']);
	echo $target;
	move_uploaded_file($_FILES['file']['tmp_name'],$target);
<<<<<<< HEAD
	header("location:../homePage.php");
=======
	echo "<br><br><a href='../homePage.php'>Click here to go to homepage</a>";
>>>>>>> 95d871bb34a0a25b8abb4dc7847a2bb55cc76f12
?>
</html>
