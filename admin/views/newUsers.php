<?php
	session_start();
	require_once("../../classes/common.class.php");
	if($_SESSION['uname']!='admin')
		header("Location:views/loginwrong.html");		
	$page=new page("Add New Users");
	echo "
	<body bgcolor=#cfcfcf style='font-family:ubuntu'>
	<form action=/admin/controllers/newUsers.php method=post>
	";

	echo "<div style='left:75px;position:absolute'>Username</div>";
	echo "<div style='left:250px;position:absolute'>Name</div>";
	echo "<div style='left:425px;position:absolute'>Project</div>";
	echo "<div style='left:600px;position:absolute'>Email</div><br>";
	for($i=0;$i<10;$i++)
	{
		echo $i;
		echo ".&nbsp;<input type=text name=uname$i>";
		echo "<input type=text name=name$i>";
		echo "<input type=text name=project$i>";
		echo "<input type=text name=email$i><br>";

	}
	echo "
	<br><br>
	<input type=submit value='Add Users'>
	</form>
	</body>
	</html>";
?>

