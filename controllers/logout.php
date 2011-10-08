<html>
<?php
	session_start();
	session_destroy();
	//redirect to login page
	header('location:../views/login.html');
?>
</html>

