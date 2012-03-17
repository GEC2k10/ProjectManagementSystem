<?php
	session_start();
	$REPO="/var/www/repos/";
	$GIT_ROOT="/var/www/repos/".$_SESSION['projectName']."/";
	$PROJECT_ROOT="/var/www/repos/".$_SESSION['projectName']."/".$_SESSION['projectName']."/";
	$DOWNLOAD="/var/www/downloads";
?>
