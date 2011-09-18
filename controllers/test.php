<html>
<title>Hello</title>
<body>
<?php
	$database=mysql_connect("localhost","root","root-user");
	mysql_select_db("GitRepoForPHP");
	$query="select * from Accounts where uname='2010441'";
	$RowHandle=mysql_query($query);
	$row=mysql_fetch_assoc($RowHandle);
	mysql_close($database);
	echo $row["passwd"];
?>
</body>
</html>

