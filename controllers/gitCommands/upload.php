<html>
<?php
	$target='/var/www/lag/controllers/gitCommands/repos/';
	$target=$target.basename($_FILES['file']['name']);
	move_uploaded_file($_FILES['file']['tmp_name'],$target);
?>
</html>
