<html>
<?php
      session_start();
/*      $con=mysql_connect("localhost",'root','root-user');
      mysql_select_db("GitRepo");
      mysql_query("update logs set logout=now() where uname='$_SESSION[username]'",$con);
       $_SESSION['username']='0';
      mysql_close($con);*/
      header('location:../views/login.html');
?>
</html>

