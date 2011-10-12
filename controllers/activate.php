<html>
<title>Activation</title>
  <?php
  session_start();
  if(!$_SESSION['SessionID'])
    	header("location:../views/login.html");
//prevent activation of logged out session
  $con = mysql_connect("localhost",'root','root');
  mysql_select_db("GitRepo",$con);
  $query="SELECT * FROM Accounts WHERE sessionID='$_SESSION[SessionID]' AND passwd=sha1('$_POST[passwd]') AND activationStatus='0'";
//here passwd refers to the confirmation code sent to user via e-mail,sessionid was set at login page
  $reply=mysql_query($query,$con);
  $row = mysql_fetch_assoc($reply);
  if($row['uname']=='')
//  	header("location:homePage.php");
	//never show this page if already activated
//------------------------------Checking entered values-------------------------------------------------//
  if($_POST['newPassword']!=$_POST['repeatPassword'])
  {
  	echo "Passwords doesn't match";
	exit;
  }
  if(strlen($_POST['secuQ'])=='0')
  	die ("Please enter a security question"); 
//-----------------------------------------------------------------------------------------------------//
  $query="UPDATE Accounts SET activationStatus ='1',passwd=sha1('$_POST[newPassword]'),secuQ='$_POST[secuQ]',secuA=sha1('$_POST[secuA]') WHERE sessionID='$_SESSION[SessionID]'";
//Updates the newly entered activation details into the master database
  mysql_query($query,$con);
  mysql_close($con);
//redirect to homepage
  header("Location:homePage.php");
?>
</html>
