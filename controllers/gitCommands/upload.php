<html>
<title>Upload</title>
<?php
	session_start();
	$_SESSION['message']=' ';
	$target=$_POST['directory'];
	if($target[strlen($target)-1]!='/')
		$target=$target.'/';
	$count=0;
	foreach ($_FILES['file']['name'] as $filename) 
	{
		$temp=$target;
		$tmp=$_FILES['file']['tmp_name'][$count];
		$count=$count + 1;
		$temp=$temp.basename($filename);
		echo $temp;
		move_uploaded_file($tmp,$temp);
		$temp='';
		$tmp='';
		$query="INSERT INTO user".$_SESSION['user_name']." VALUE(\"".$filename."\",CURDATE())";
                $reply=mysql_query($query,$con);
	}
	$_SESSION['message']="done";
	header("location:../../views/upload.php");
?>
</html>
