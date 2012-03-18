<html>
<head>
<?php
	session_start();
	include("../config.php");
	require_once("../classes/common.class.php");
	$page=new page("Create Directory");
	if (!isset($_SESSION['uname']) || $_SESSION['uname']==$_SESSION['projectName'])
		header("location:/views/loginwrong.html");
?>
<form action="../controllers/mkdir.php" method="post" >
<fieldset>
<h3 style=display:inline>Enter Directory name:</h3>
<input type="text" name="dirName"><br>
Select target:<br>
<?php
	include("../config.php");
	exec("find $PROJECT_ROOT \( ! -regex '.*/\..*' \) -type d ",$out);
	foreach ($out as &$tmp)
	{
		$sub=substr($tmp,strlen($PROJECT_ROOT));
		if(strcmp($out[0],$tmp)==0)
			echo "<input type='radio' name='directory' value='$tmp' CHECKED/>$sub<br>";
		else
			echo "<input type='radio' name='directory' value='$tmp'/>$sub<br>";
	}
?>
<input type="submit" value="Create Directory" >
</form>
</body>
</html>
