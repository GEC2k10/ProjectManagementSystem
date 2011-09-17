<html><body style="background-image: url(../views/images.png); color: rgb(0, 0, 0);" alink="#ee0000" link="#0000ee" vlink="#551a8b">
<br><br><br><br><center>
<?php
$con=mysql_connect(localhost,'root','password');
mysql_select_db("GitRepoForPHP");
$query = sprintf("SELECT * FROM Accounts WHERE UserName='%s' AND password='%s'",
	mysql_real_escape_string($_POST[usrname]),
	mysql_real_escape_string(sha1($_POST[pwd])));
mysql_query($query);
$reply=mysql_query($query,$con);
$row=mysql_fetch_array($reply);
if($row['UserName']==""){ echo "Incorrect user name or password "; exit; }
else {echo "Login Success";}
mysql_close($con);
?>
</body>
</html?
