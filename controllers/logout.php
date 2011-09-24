<html>
<?php
      session_start();
      $_SESSION['username']='0';
/*    $con=mysql_connect("localhost",'root','root-user');
      mysql_select_db("GitRepoForPHP");
      $query = "update Accounts set sessionID='0',loginStatus='0' WHERE uname='".$_GET['username']."'"." and sessionID='".$_GET['ssid']."'";
      mysql_query($query,$con);
      mysql_close($con);*/
      header('location:../views/login.html');
?>
</html>

