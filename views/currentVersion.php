<?php
	require_once("../classes/common.class.php");
	session_start();
	$page=new page("Files in current version");
	if (!isset($_SESSION['uname']))
		header("location:/views/loginwrong.html");
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
		?>
	</i>
</body>
</html>
