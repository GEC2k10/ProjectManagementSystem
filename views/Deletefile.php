<html>
<head>
<link rel="shortcut icon" href="icons/mkdirIcon.png">
<style type="css/text">
body
{margin-left:1000px;}
</style>
<h1><center><span style="display:inline;">Delete Directory or File</center></h1>
</head>
<title>Delete</title>
<?php/*
	session_start();
	echo $_SESSION['message'];
	$_SESSION['message']='';
        $con=mysql_connect("localhost",'root','password');
        mysql_select_db("GitRepo");
        $query = "SELECT * FROM Accounts WHERE sessionID='".$_SESSION['SessionID']."'";
//Selects row that matches sessionId of current session.The session ID was written into the database in the login page.
        $reply=mysql_query($query,$con);
        if(!mysql_num_rows($reply))
        {
//	prevent unautorized acess using homepage security
		header("location:../controllers/homePage.php");
        }*/
?>
<h6 align="right"><a href="../controllers/logout.php"><input type="submit" style="design:inline" value="Logout"></a>
<a href="../controllers/homePage.php"><input type="submit" value="Home"></a></h6>
<br><br><br><body bgcolor=#cfcfcf alink="#ee0000" link="#0000ee" vlink="#551a8b">
<form action="../controllers/Deletefile.php" method="post" >
<fieldset>
Enter Directory or file name:<input type="text" name="filename"><br>
<input type="submit" value="Delete" >
</form>
</body>
</html>
