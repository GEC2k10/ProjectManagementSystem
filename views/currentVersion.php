<?php
	require_once("../classes/common.class.php");
	session_start();
	$page=new page("Files in current version");
	if (!isset($_SESSION['uname']))
		header("location:/views/loginwrong.html");
?>
	<i>
		<?php
		include("../config.php");
		exec("find $PROJECT_ROOT \( ! -regex '.*/\..*' \) -type f ",$row);
		foreach ($row as &$tmp)
			{
				$file=urlencode(substr($tmp,strlen($GIT_ROOT)));
    			echo "
				<a href=../views/showfile.php?filename=$file>";
				echo substr($tmp,strlen($PROJECT_ROOT))."<br></a>";
			}
		?>
	</i>
</body>
</html>
