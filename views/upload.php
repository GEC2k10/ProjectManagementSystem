<?php
	session_start();
	require_once("../classes/database.class.php");
	require_once("../classes/common.class.php");
	$con=new Database;
	$page=new page("Modify Project");

	if ($con->checkCookie($_SESSION['sessionID'],$_SESSION['uname'])==0 || $_SESSION['uname']==$_SESSION['projectName'])
	{
		$con->close();
		header("location:loginwrong.html");
	}
	$con->messageDump();
	$con->close();
?>
<br><br><br>
<form method='post' action='mkdir.php' style="display:inline">
	<div style="top:90px;left:0px;position:absolute">
		<input type='image' src='icons/mkdir.png' value='New Directory'>
		<div style="top:90px;left:10px;position:absolute">
			<font face='Ubuntu' size='2' >New directory</font>
		</div>
	</div>
</form>

<form method='post' action='deleteMenu.php' >
	<div style="top:90px;left:150px;position:absolute">
		<input type='image' src='icons/delete.jpg' value='New Directory'>
		<div style="top:90px;left:35px;position:absolute">
			<font face='Ubuntu' size='2' >Delete</font>
		</div>
	</div>
</form>

<br><br><br>

<form action="../controllers/gitCommands/upload.php" method="post" enctype="multipart/form-data">
<fieldset>
<i><u>Select files to upload:<br><br>
<input type='file' name='file[]' multiple><br><br>
Select target:</i></u><br>

<?php
	exec("find /var/www/repos/$_SESSION[projectName]/$_SESSION[projectName]/  \( ! -regex '.*/\..*' \) -type d ",$out);
	foreach ($out as &$tmp)
	{
		$sub=substr($tmp,16+2*strlen($_SESSION['projectName']));
		if(strcmp($tmp,$out[0])==0)
			echo "<input type='radio' name='directory' value='$tmp' CHECKED/>$sub<br>";
		else
			echo "<input type='radio' name='directory' value='$tmp'/>$sub<br>";
	}
?>

<input type="submit" value="Upload" >
</form>
</body>
</html>
