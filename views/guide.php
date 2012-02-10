<?php
session_start();
?>
<html>
<head>
	<style type="text/css" >
		.members
		{
			border:3px solid black;
			width:100px;
			background-color:#afafaf;	
			height:350px;
		}
	a
	{
		display:block;
    }
	a:hover
	{
		color:red;
	}

	.commit
	{
		border:3px solid black;
		width:400px;
		height:340px;
		background-color:#afafaf;
		margin-left:200px;
		margin-top:-350px;
	}

	.listCommits
	{
		border:3px solid black;
		width:200px;
		background-color:#afafaf;
		margin-left:800px;
		margin-top:-350px;
	}

</style>

</head>
<style type="text/css">
body {
	background-color:#cfcfcf;
} 
</style>
<body bgcolor = "green">
<script language="php">
require_once("../classes/database.class.php");
$con=new Database;
if ($con->checkCookie($_SESSION['sessionID'],$_SESSION['uname'])==0)
{
	$con->close();
	header("Location:../views/loginwrong.html");
}
$con->close();
require_once("../classes/guide.class.php"); 
echo "<h1 align=center>Guides Home Page</h1>";
echo "<a href='../controllers/logout.php'><h3 align='right'><input type='submit' value='Logout'></h3></a>";
echo "<h3 align=center>Weclome ".$_SESSION["projectName"]." Guide</h3>";
echo "<h3 align = left > Project Contributers <h3>";
$guide = new Guide($_SESSION["projectName"]);
$guide->show_members();
$guide->show_commit_button();
$guide->show_commits();
</script>
</html>
