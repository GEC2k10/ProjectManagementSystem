<?php
session_start();
?>
<?php
require_once("login.class.php");
$user=new Login($_POST["uname"],$_POST["passwd"]);
$user->Authenticate();
?>

