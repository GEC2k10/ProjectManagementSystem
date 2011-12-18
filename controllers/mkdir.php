<?php
	$oldumask = umask(0);
	mkdir($_POST['directory'].'/'.$_POST['dirName'], 0777);
	umask($oldumask);
	header("Location:../views/upload.php");
?>


