
	<?php
		session_start();
		$REPO="/var/www/repos/";
		$GIT_ROOT=$REPO.$_SESSION['projectName']."/";
		$PROJECT_ROOT=$REPO.$_SESSION['projectName']."/".$_SESSION['projectName']."/";
		$DOWNLOAD="/var/www/downloads/";
		$DB_SERVER="localhost";
		$DB_USER="root";
		$DB_PASSWORD="password";
	?>
	
