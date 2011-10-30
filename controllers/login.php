<?php
session_start();
?>
<?php
require_once("../classes/login.class.php");
$user=new Login($_POST["uname"],$_POST["passwd"]);  // create an user object 
$user->Authenticate();  // Authentication 
?>

