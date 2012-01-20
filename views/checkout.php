<?php
	session_start();
	require_once("../classes/database.class.php");
	$con=new Database;
	if($con->checkCookie($_SESSION['sessionID'],$_SESSION['projectName'])==0)
	{
		$con->close();
		header("location:loginwrong.html");
	}
	else
	{
	echo "
	<html>
	<body bgcolor=#cfcfcf>
	<title>Checkout</title>
	<div style='right:10px;top:5px;position:absolute'>
		<a href=../controllers/logout.php>
		<input type=submit value=Logout>
		</a>
		<a href=guide.php>
		<input type=submit value=Home>
		</a>
	</div>
	<h1 align=center>View Previous Versions of the Project</h1>
	List Of Commits:<br>
	<form action=../controllers/gitCommands/checkout.php method=post>
	<b>
	";
	$reply=$con->query("SELECT Contribution,Date FROM Contributions WHERE Username='$_SESSION[uname]'");
	if($reply!=0)
	{
		$row=mysql_fetch_assoc($reply);
		echo "<input type=radio value=$row[Contribution] name=version CHECKED>Commit on $row[Date]<br>";
		while($row=mysql_fetch_assoc($reply))
			echo "<input type=radio value=$row[Contribution] name=version>Commit on $row[Date]<br>";
		echo "<input type=submit value=Checkout>
			</b>
			</form>
			</body>
			</html>";
	}
	}
?>

