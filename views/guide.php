<?php
session_start();
?>
<html>
<head></head>
<style type="text/css">
body {
background-image:url('images.png');
} 
</style>
<body bgcolor = "green">
<script language="php">
require_once("../classes/guide.class.php"); 
echo "<font color=red><h1 align=center>Guides Home Page</h1></font>";
echo "<h3 align=center>Weclome ".$_SESSION["projectName"]."</h3>";
echo "<h3 align = left > Project Contributers <h3>";
$guide = new Guide($_SESSION["projectName"]);
$guide->show_members();
$guide->show_commit_button();
</script>

</html>

