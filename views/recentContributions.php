<?php
	require_once("../classes/database.class.php");
	require_once("../classes/common.class.php");
	session_start();
	include("../config.php");
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
		exec("find $PROJECT_ROOT \( ! -regex '.*/\..*' \) -type f ",$row);
		foreach ($row as &$tmp)
			{
				$file=urlencode(substr($tmp,strlen($PROJECT_ROOT)));
    			echo "
				<a href=../views/showfile.php?filename=$file>";
				echo substr($tmp,strlen($PROJECT_ROOT))."<br></a>";
			}
			$con->close();
		?>
	</i>
</body>
</html>
