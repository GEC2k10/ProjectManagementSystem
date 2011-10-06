<html>
<title>Activation</title>
  <?php
  session_start();
  if($_SESSION['username']==0)
  {
  	header("location:../views/login.html");
  }
  $con = mysql_connect("localhost",'root','root-user');
  mysql_select_db("GitRepo",$con);
  $query="SELECT * FROM Accounts WHERE uname='$_SESSION[username]' AND passwd=sha1('$_POST[passwd]') AND activationStatus='0'";
  $reply=mysql_query($query,$con);
  $row = mysql_fetch_assoc($reply);
  if($_POST['newPassword']!=$_POST['repeatPassword'])
  {
  echo "Passwords doesn't match";exit;
  }
  if(strlen($_POST['secuQ'])==0)
  {
  die ("Please enter a security question"); 
  }
  if($row['uname']=='')
  {
  	die("Unauthorized user"); 
  }
  else 
  {
          $query="UPDATE Accounts SET activationStatus ='1',passwd=sha1('$_POST[newPassword]'),secuQ='$_POST[secuQ]',secuA=sha1('$_POST[secuA]') WHERE uname='$_SESSION[username]'";
          mysql_query($query,$con);
	  mysql_close($con);
	  header("Location:homePage.php");
  }
?>
</html>
