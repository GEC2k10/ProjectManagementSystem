<html>
<title>Upload</title>
<?php
	session_start();
	$_SESSION['message']=' ';
	$target=$_POST['directory'];
	$count=0;
	foreach ($_FILES['file']['name'] as $filename) 
	{
		$temp=$target;
		$tmp=$_FILES['file']['tmp_name'][$count];
		$count=$count + 1;
		$temp=$temp.basename($filename);
		echo $temp;
		if(move_uploaded_file($tmp,$temp))
			$_SESSION['message']="Successfully uploaded file".$filename;
		else
			echo "failed";
		$temp='';
		$tmp='';
	}
	header("location:../../views/upload.php");
?>
</html>
