<?php
<<<<<<< HEAD
	include("config.php");
	echo $REPO;
	echo $GIT_ROOT;
=======
	chdir("/home/rajeevs/myFiles/projects/ProjectManagementSystem");

	exec("git log --graph --format=%h --all",$out);
	$regex='/[0-9a-f]{7}/i';
	foreach($out as &$tmp)
	{
		if(preg_match($regex,$tmp,$matches))
			echo $matches[0]."<br>";
	}
>>>>>>> 0158d0ce0082cf42f1c9214d4fb30ec27cd3cc34
?>
