<html>
<title>Upload</title>
<?php
	session_start();
	require_once("../../classes/database.class.php");
	$con=new Database;
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
		if(move_uploaded_file($tmp,$temp))
		{
			$con->query("INSERT INTO messages VALUES('$filename uploaded successfully!!!')");
			$query="
			INSERT INTO Contributions VALUES('$_SESSION[uname]','$_SESSION[projectName]','$temp',NOW(),'0')";
			$con->query($query);
		}
		else
			$con->query("INSERT INTO messages VALUES('$filename upload failed!!!')");
		$temp='';
		$tmp='';
	}
	header("location:../../views/upload.php");
?>
</html>
