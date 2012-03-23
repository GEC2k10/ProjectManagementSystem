<?php
	require_once("../classes/common.class.php");
	session_start();
	$page=new page("Guide's Control Panel");
	if (!isset($_SESSION['uname']) || $_SESSION['uname']!=$_SESSION['projectName'])
		header("location:/views/loginwrong.html");
	echo "
	<form action=/controllers/guidePanel.php method=post>
		<input type=radio value=currentVersion.php name=target CHECKED>View Current Version<br>
		<input type=radio value=commitDetails.php name=target>View Project Tree<br>
		<input type=radio value=commitDetails.php name=target>View Commit message of a commit<br>
		<input type=radio value=branch.php name=target>Create a new branch<br>
		<input type=radio value=checkout.php name=target>Switch Branch<br>
		<input type=radio value=changesToFile.php name=target>View changes to files in version<br>
		<input type=radio value=newFiles.php name=target>View new files in version<br>
		<input type=submit value='Proceed>>'>
	</form>	";
?>
