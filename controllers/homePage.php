<html>
	<head>
		<link rel="shortcut icon" href="../views/icons/home.png">
	</head>
	<?php
	require_once("../classes/database.class.php");
	$con = new Database();
	session_start();
	if ($con->checkCookie($_SESSION['sessionID'],$_SESSION['uname'])==0)
	{
		$con->close();
		header("location:../views/loginwrong.html");
	}
	$con->messageDump();
	echo "<title>Homepage of $_SESSION[uname]</title>";
	echo $_SESSION['message'];$_SESSION['message']=''; 
	?>
	<body bgcolor=#cfcfcf>
		<font face='Ubuntu'>
			<h1>
				<center>
						Welcome <?php echo $_SESSION['uname'];?>
				</center>
			</h1>
			<form method='post' action='logout.php' align='right'>
				<input type='submit' value='Logout'>
			</form>
		<font size="6">
			Project name :<?php echo  $_SESSION['projectName']; ?>
		</font><br><br>
		<form method=post action=../views/upload.php style=display:inline>
			<div style='top:200px;left:50px;position:absolute'>
				<input type=image src=../views/icons/upload.png value=Upload a file style=display:inline>
			</div>
		</form>
		<form method=post action=gitCommands/download.php style=display:inline>
			<div style='top:200px;left:300px;position:absolute'>
				<input type=image src=../views/icons/download.png value='Download all files'><br>
			</div>
		</form>
	</font>
	<font size='4' face='ubuntu'>
	<div style='top:360px;left:120px;position:absolute'>
		Upload
	</div>
	<div style='top:360px;left:360px;position:absolute'>
		Download
	</div>
	</font>
	<div style='top:150px;right:300px;position:absolute;border:3px solid #888;font-size:18px'>
		<u>Recent Contibutions</u><br><br>
		<i>
		<?php
			$reply=$con->query("SELECT DISTINCT Contribution FROM Contributions WHERE Username=$_SESSION[uname] ORDER BY Date DESC LIMIT 10");
			while($row=mysql_fetch_assoc($reply))
			{
				$file=substr($row['Contribution'],15);
    			echo "
				<a href=../views/showfile.php?filename=$file>";
				echo substr($row['Contribution'],16+strlen($_SESSION['projectName']))."<br></a>";
			}
			$con->close();
		?>
		</i>
	</div>
	<div style='bottom:0px;position:absolute'>
	<h6>Copyright(c).All Rights Reserved.GEC TCR LAG 2010-2014</h6></div>
	</body>
</html>
