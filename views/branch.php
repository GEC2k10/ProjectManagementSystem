<?php
	require_once("../classes/database.class.php");
	require_once("../classes/common.class.php");
	session_start();
	$con=new Database;
	$page=new page("Create new branch");
	if (!isset($_SESSION['uname']) || $_SESSION['uname']!=$_SESSION['projectName'])
		header("location:/views/loginwrong.html");
	$con->messageDump();
	$con->close();
	echo "
	<h2>Branching $_SESSION[projectName]</h2>
	<h3>Branch point $_GET[version]</h3>
	Branching switches the current version into a previous version and<br>
	further development will be made to that version.However there is<br>
	always an option to go back to the previous branch.<br>
	<form action=/controllers/gitCommands/branch.php method=post>
	<div style=top:250;left:50;position:absolute>
		<h3>Please Enter a Branch Name</h3>
		<input type=text name=branch><br><br>
		<input type=hidden name=version value=$_GET[version]>
		<input type=submit value='Create Branch'>
	</div>
	</form>
	</body>
	</html>
	";
?>

