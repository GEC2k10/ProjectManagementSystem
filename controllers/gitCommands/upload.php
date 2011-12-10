<html>
<?php
	session_start();
	$_SESSION['message']=' ';

	$target=$target.$_POST['directory'];
	if($target[strlen($target)-1]!='/')
		$target=$target.'/';
	$target=$target.basename($_FILES['file']['name']);
	echo $target;
	if(move_uploaded_file($_FILES['file']['tmp_name'],$target))
		$_SESSION['message']="Successfully uploaded file".$_FILES['file']['name'];
	else
		echo "failed";
	header("location:../../views/upload.php");
?>
</html>
