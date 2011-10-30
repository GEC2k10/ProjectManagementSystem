<?php
$path = "/var/projects/".$_GET['projectName'];  // project name is passed to this script
exec("cd ".$path."&& git add *");  // Adding all files , needs an correction
exec("cd ".$path."&& git commit -m 'message'"); // commits with an message 'message' 
echo "<h3 align = center> Succesfully commited all the files.</h3>";
?>

