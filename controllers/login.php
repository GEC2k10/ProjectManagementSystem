<html><body style="background-image: url(../views/images.png); color: rgb(0, 0, 0);" alink="#ee0000" link="#0000ee" vlink="#551a8b">
<br><br><br><br><center>
<?php
$con=mysql_connect("localhost",'root','root-user');
mysql_select_db("GitRepoForPHP");
$query = sprintf("SELECT * FROM Accounts WHERE uname='%s' AND passwd='%s'",
	mysql_real_escape_string($_POST[uname]),
	mysql_real_escape_string(sha1($_POST[passwd])));
$reply=mysql_query($query,$con);
$row=mysql_fetch_assoc($reply);
if($row['uname']=="")
{
	echo "Incorrect user name or password "; 
	exit;
}
else 
{
	$ID='';
	$caps=array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');
	$small=array('a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z');
	$num=array('0','1','2','3','4','5','6','7','8','9');
	for($i=0;$i<40;$i++)
	{
	$list=rand(1,3);
	if($list==1)
		$ID=$ID.$caps[rand(0,25)];
	elseif($list==2)
	 	$ID=$ID.$small[rand(0,25)];
	else
	        $ID=$ID.$num[rand(0,9)];
	}
	echo $ID;
	$query="update Accounts set loginStatus='1',sessionID='".$ID."' where uname='".$row['uname']."'";
 	mysql_query($query,$con);
	mysql_close($con);
	header("Location:homePage.php?ssid=$ID");
}
?>
</body>
</html?
