<html>
<body style="background-image: url(../views/images.png); color: rgb(0, 0, 0);" alink="#ee0000" link="#0000ee" vlink="#551a8b">
<?php
	$con=mysql_connect("localhost",'root','root-user');
	mysql_select_db("GitRepoForPHP");
	$query = sprintf("SELECT * FROM Accounts WHERE sessionID='".$_GET['ssid']."'");
	$reply=mysql_query($query,$con);
	$row=mysql_fetch_assoc($reply);
	echo $row['uname'];
?>

</body>
</html>

