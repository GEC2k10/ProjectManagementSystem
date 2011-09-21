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
	for($i=0;$i<40;$i++)
	{
		$list=rand(0,3);
        	if($list==0)
                	 $ID=$ID.chr(rand(97,122));
	        elseif($list==1)
        	        $ID=$ID.chr(rand(48,57));
		else 
			$ID=$ID.chr(rand(65,90));
	}
	$query="update Accounts set loginStatus='1',sessionID='".$ID."' where uname='".$row['uname']."'";
 	mysql_query($query,$con);
	mysql_close($con);
	header("Location:homePage.php?ssid=$ID");
}
?>
</body>
</html?
