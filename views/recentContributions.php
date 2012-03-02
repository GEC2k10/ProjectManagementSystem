<?php
	require_once("../classes/database.class.php");
	session_start();
	$con=new Database;
	if($con->checkCookie($_SESSION['sessionID'],$_SESSION['uname'])==0)
	{
		$con->close();
		header("location:loginwrong.html");
	}
	$con->close();
?>
<html>
<body bgcolor=#cfcfcf>
<h6 align="right"><a href="../controllers/logout.php">
<input type="submit" value="Logout" style="display:inline"></a>
<a href="../controllers/homePage.php"><input type="submit" value="Home" style="display:inline"></a></h6>
<font face=ubuntu>
		<h3><u>Files in Current Version</u></h3>
		<i>
		<?php
		exec("find /var/www/repos/$_SESSION[projectName]/  \( ! -regex '.*/\..*' \) -type f ",$row);
		foreach ($row as &$tmp)
			{
				$file=urlencode(substr($tmp,15));
    			echo "
				<a href=../views/showfile.php?filename=$file>";
				echo substr($tmp,15+strlen($_SESSION['projectName']))."<br></a>";
			}
			$con->close();
		?>
		</i>
</div>
</font>
</body>
</html>
