<?php
$con=mysql_connect("localhost","root","password");
mysql_select_db("GitRepo");
$path = "/var/www/repos/$_POST[projectName]";  // project name is passed to this script
chdir($path);
exec("git add * ");
exec("git commit -am '$_POST[commitMessage]'",$a); // commits with an message 'message' 
if($a[0][0]=='[')
{
	echo "<h1>Commited Succesfully!!!!</h1>";
	$head=substr($a[0],8,7);
	$query="INSERT INTO Contributions VALUES('$_POST[projectName]','$head',NOW())";
	mysql_query($query,$con);
}
else
	echo "<h1>Nothing to Commit!!!</h1>";
mysql_close();
?>

