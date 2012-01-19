<html>
<title>Upload</title>
<?php
	session_start();
	$_SESSION['message']=' ';
	$con=mysql_connect("localhost","root","password");
	mysql_select_db("GitRepo",$con);
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
		$rply=move_uploaded_file($tmp,$temp);
		$_SESSION['message']=$rply;
                $query="INSERT INTO Contributions VALUE(\"".$_SESSION['uname']."\",\"".$temp."\",CURDATE())";
                $reply=mysql_query($query,$con);
		$temp='';
		$tmp='';
	}
	header("location:../../views/upload.php");
?>
</html>
