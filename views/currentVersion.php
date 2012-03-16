<?php
	require_once("../classes/database.class.php");
	require_once("../classes/common.class.php");
	session_start();
	$con=new Database;
	$page=new page("Files in current version");
	if($con->checkCookie($_SESSION['sessionID'],$_SESSION['uname'])==0)
	{
		$con->close();
		header("location:loginwrong.html");
	}
	$con->close();
?>
	<i>
		<?php
		exec("find /var/www/repos/$_SESSION[projectName]/$_SESSION[projectName]/  \( ! -regex '.*/\..*' \) -type f ",$row);
		foreach ($row as &$tmp)
			{
				$file=urlencode(substr($tmp,15));
    			echo "
				<a href=../views/showfile.php?filename=$file>";
				echo substr($tmp,16+2*strlen($_SESSION['projectName']))."<br></a>";
			}
			$con->close();
		?>
	</i>
</body>
</html>
