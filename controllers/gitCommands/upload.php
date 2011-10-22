<html>
<title>Upload Files to the central Repository</title>
<?php
	session_start();
	$target="/var/www/lag/controllers/gitCommands/repos/".$_SESSION['project']."/";
	$_SESSION['message']=' ';
	$target=$_POST['directory'].'/';
	echo $target;
	$target=$target.basename($_FILES['file']['name']);
	move_uploaded_file($_FILES['file']['tmp_name'],$target);
	header("location:../../views/upload.php");
?>
</html>
