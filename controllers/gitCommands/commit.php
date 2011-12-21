<?php
$path = "/var/www/repos/$_POST[projectName]";  // project name is passed to this script
chdir($path);
exec("git log ");
exec("git commit -am '$_POST[commitMessage]'",$a); // commits with an message 'message' 
echo "<h3 align = center> Succesfully commited all the files.</h3>";
?>

