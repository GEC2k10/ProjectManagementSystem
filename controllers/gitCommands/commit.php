<?php
require_once("../../classes/database.class.php");
session_start();
$con=new Database;
if($con->checkCookie($_SESSION['sessionID'],$_SESSION['uname'])==0)
{
	$con->close();
	header("../../views/loginwrong.html");
}

$path = "/var/www/repos/$_POST[projectName]";  // project name is passed to this script
chdir($path);
exec("git init ");
exec("git add * ");
exec("git commit -am '$_POST[commitMessage]'",$a); // commits with an message 'message' 
if($a[0][0]=='[')
{
	echo "<h1>Commited Succesfully!!!!</h1>";
	$head=substr($a[0],8,7);
	$query="INSERT INTO Contributions VALUES('$_POST[projectName]','$head',NOW())";
	$con->query($query);
	$con->query("UPDATE Contributions SET commit='1' WHERE projectName=$_POST[projectName]");
	$con->close();
}
else
	echo "<h1>Nothing to Commit!!!</h1>";
?>

