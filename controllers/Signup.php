<html>
  <body>
  <?php
	function ValidateEmail($email)   // Validates an Email 
	{
	    if(ereg("^.+@.+\\..+$",$email)) // using regular expressions 
        	return true;
	    else
        	return false;
	}

	function ValidateInput(&$input)   // removes scripting tags from input
	{
	    ereg_replace("^< .+ >$","",$input); // regex used again
	}
	if(ValidateEmail($_POST['email']))
	{
		$con = mysql_connect("localhost",'root','root');
		mysql_select_db("GitRepo",$con);
		$query="SELECT activation FROM Accounts WHERE uname='$_POST[idnum]'";
		$reply=mysql_query($query,$con);
		$row = mysql_fetch_array($reply);
		$activation=$row['activation'];
		if($activation=="1"){ die("Unauthorized");}

		if(!$_POST['password_new']==$_POST['rpassword_new']){echo "Passwords doesn't match";exit;}

		$len=strlen($_POST['securityQ']);  //Checking whether Security Qn has been entered or not
		if($len==0){ die ("Please enter a secutiry question"); }

	        $len=strlen($_POST['password_new']);
		if($len<8){echo "Password too short";exit;} //Password length check
		$sha_old=sha1($_POST['password_old']);
		$query="SELECT uname,email,passwd FROM Accounts WHERE uname='$_POST[idnum]'";
		$result=mysql_query($query,$con);
		$row = mysql_fetch_array($result);
		$sha_new=sha1($_POST['password_new']);
		

		if(!$row['uname']==$_POST['idnum']){die("Unauthorized user"); } // Checking the user names of DB & Input
		else 
		{
        		if(!($row['email']==$_POST['email'])){ die("Email not matching");}
		        if(!($row['passwd']==$sha_old)){die("Incorrect password");}
        		$query="UPDATE Accounts SET  passwd='$sha_new' WHERE uname='$_POST[idnum]'";
	        	mysql_query($query,$con);
	        	$query="UPDATE Accounts SET secuQ='$_POST[securityQ]' WHERE uname='$_POST[idnum]'";
		        mysql_query($query,$con);
        		$query="UPDATE Accounts SET  secuA='$_POST[securityA]' WHERE uname='$_POST[idnum]'";
		        mysql_query($query,$con);
        		$query="UPDATE Accounts SET activation ='' WHERE uname='$_POST[idnum]'";
	        	mysql_query($query,$con);
	        	echo "Success";
	         }	
	}
	else{echo "Please enter a valid email ";}
