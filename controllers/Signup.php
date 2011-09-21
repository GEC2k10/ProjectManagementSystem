<html>
  <body>
  <?php
  $user="root";
  $password="mysql";
  $con = mysql_connect("localhost",'root','mysql');
  mysql_select_db("GitRepo",$con);
  $query="SELECT activation FROM Accounts WHERE uname='$_POST[idnum]'";
  $reply=mysql_query($query,$con);
  $row = mysql_fetch_array($result);
  $activation=$row['activation'];
  echo $activation;
  if($activation==""){ die("Unauthorized");}
  if(!$_POST['password']==$_POST['rpassword']){echo "Passwords doesn't match";exit;}
 if(!$_POST['password']==$_POST['rpassword']){echo "Passwords doesn't match";exit;}
  $len=strlen($_POST['securityQ']);
if($len==){ die ("Please enter a secutiry question"); }
  $shap=sha($_POST['password']);
  $query="SELECT uname,email,passwd FROM Accounts WHERE uname='$_POST[idnum]'";
  $result=mysql_query($query,$con);
  $row = mysql_fetch_array($result);
  $shap=sha($_POST['password']);
  $len=strlen($_POST['password']);
  if($len<){echo "Password too short";exit;}
 
  if(!$row['uname']==$_POST['idnum']){die("Unauthorized user"); }
  else {
          if(!($row['email']==$_POST['email'])){ die("Email not matching");}
          if(!($row['passwd']==$shap)){die("Incorrect password");}
          $query="UPDATE Accounts SET  passwd='$shap' WHERE uname='$_POST[idnum]'";
          mysql_query($query,$con);
          $query="UPDATE Accounts SET secuQ='$_POST[securityQ]' WHERE uname='$_POST[idnum]'";
          mysql_query($query,$con);
          $query="UPDATE Accounts SET  secuA='$_POST[securityA]' WHERE uname='$_POST[idnum]'";
          mysql_query($query,$con);
          $query="UPDATE Accounts SET activation ='' WHERE uname='$_POST[idnum]'";
          mysql_query($query,$con);
          echo "Success";
       }

