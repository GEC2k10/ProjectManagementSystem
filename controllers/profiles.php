<html>
<?php
	$con=mysql_connect("localhost",'root','root-user');
        mysql_select_db("GitRepoForPHP");
        $query = sprintf("SELECT * FROM Accounts WHERE uname='".$_GET['username']."'"."and sessionID='".$_GET['ssid']."'");
        $reply=mysql_query($query,$con);
	$row=mysql_fetch_assoc($reply);
?>

<title>Profile of <?php echo $row['uname']; ?></title>
<head><center><h1>Profile of <?php echo $row['uname']; ?></h1></center></head>
<body style="background-image: url(../views/images.png); color: rgb(0, 0, 0);" alink="#ee0000" link="#0000ee" vlink="#551a8b">
</body>
</html>

