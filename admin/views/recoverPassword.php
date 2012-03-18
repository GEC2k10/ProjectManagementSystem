<?php
	session_start();
	require_once("../../classes/common.class.php");
	$page=new page("Recover Lost Password");
	if($_SESSION['uname']!='admin')
		header("Location:views/loginwrong.html");		
	$page="
	<form action=/admin/controllers/reset.php method=post>
	Username <input type=text name=uname><br><br>
	Password <input type=password name=passwd><br><br>
	<input type=submit value='Reset Password'>
	</body>
	</html>";
	echo $page;
?>
