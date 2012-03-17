<?php
	session_start();
	$REPO="/var/www/lag/";
	$GIT_ROOT="/var/www/lag/repos/".$_SESSION['projectName']."/";
	$PROJECT_ROOT="/var/www/lag/repos/".$_SESSION['projectName']."/".$_SESSION['projectName']."/";
	$DOWNLOAD="/var/www/downloads";
?>
