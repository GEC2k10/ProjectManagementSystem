<html>
<?php
	session_start();
	$target="/var/www/lag/controllers/gitCommands/repos/".$_SESSION['project']."/";
	$_SESSION['message']=' ';
	$target=$_POST['directory'].'/';
	$target=$target.basename($_FILES['file']['name']);
	if(move_uploaded_file($_FILES['file']['tmp_name'],$target))
		$_SESSION['message']="Successfully uploaded file".$_FILES['file']['name'];
	header("location:../../views/upload.php");
?>
</html>
