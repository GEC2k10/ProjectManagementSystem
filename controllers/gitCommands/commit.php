<?php
	require_once("../../classes/database.class.php");
	session_start();
	$con=new Database;
	if($con->checkCookie($_SESSION['sessionID'],$_SESSION['uname']) == '0')
	{
		$con->close();
		header("location:../../views/loginwrong.html");
	}
	chdir("/var/www/repos/$_POST[projectName]");  // project name is passed to this script
	exec("git init ");
	exec("git add * ");
	exec("git commit -am '$_POST[commitMessage]'",$a); // commits with an message 'message' 
	if($a[0][0]=='[')
	{
		echo "<h1>Commited Succesfully!!!!</h1>";
		$head=substr($a[0],8,7);
		$con->query="
		INSERT INTO Contributions VALUES('$_POST[projectName]','$_SESSION[projectName]','$head',NOW(),'1')";
		$con->query("UPDATE Contributions SET commit='1' WHERE projectName='$_SESSION[projectName]'");
		$con->close();
	}
	else
		echo "<h1>Nothing to Commit!!!</h1>";
?>

