<?php
	require_once("../classes/database.class.php");
	require_once("../classes/common.class.php");
	$con=new Database;
	$page=new page("Guide's Control Panel");
	if($con->checkCookie($_SESSION['sessionID'],$_SESSION['projectName'])==0)
	{
		$con->close();
		header("/views/loginwrong.html");
	}
	echo "
		<ol>
			<li>
				<a href=/views/recentContributions.php>
					View Current version
				</a>
			</li>
			<li>
				<a href=/controllers/gitCommands/log.php>
					View Commit tree
				</a>
			</li>
			<li>
				<a href=/views/diff.php>
					View Changes between versions
				</a>
			</li>
			<li>
				<a href=/views/recentContributions.php>
					Create new branch
				</a>
			</li>";

