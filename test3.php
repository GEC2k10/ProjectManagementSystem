<?php
	$reply=mysql_query("select * from GitRepo.Accounts");
	$row=mysql_fetch_assoc($reply);
	var_dump($row);
?>
