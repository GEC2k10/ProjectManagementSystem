<?php
/*  The Login class acting as the back end of Login.html 
 *  Establishes connection with database , fetches the 
 *  user information and  take appropriate action on the basis of it
 *  Last modified : 30/10/2011
 *  login.class.php
 */


class Login
{
  private $_con,$_query,$_reply,$_row;
  private $_uname,$_passwd,$_projectName;
  private $_sessionID;
  public function __construct($uname,$passwd)
  {
    $this->_con=mysql_connect("localhost","root","password");
    mysql_select_db("GitRepo",$this->_con);
    $this->_uname=mysql_real_escape_string(trim(substr($uname,0,30)));
    $this->_passwd=sha1($passwd);
    $this->_query=sprintf("
	SELECT uname,projectName FROM Accounts WHERE uname='%s' AND passwd='%s'",$this->_uname,$this->_passwd);
    $this->_reply=mysql_query($this->_query,$this->_con);
    $this->_row = mysql_fetch_assoc($this->_reply);
    if( $this->_row['uname']=="")
    { 
       mysql_close($this->_con);
       header("Location:/lag/views/loginwrong.html");
       exit;
    }
    $this->_projectName=$this->_row['projectName'];
  }
  private function is_guide()  
  {
     return ($this->_uname==$this->_projectName);
  }
  private function is_user()  
  {
    return ($this->_row['uname'] != "admin");
  }
  private function is_admin()  
  {
    return ($this->_row['uname'] == "admin");
  }
  public function Authenticate()
  {
    if( $this->is_guide())
    {
        $_SESSION['projectName']=$this->_projectName;
     	mysql_close($this->_con);
		header("Location:../views/guide.php");  
		exit;
    }
    else if($this->is_user())
    {
        $this->_sessionID = sha1(date("D M j G:i:s T Y"));
        $_SESSION['SessionID']=$this->_sessionID;
        $_SESSION['username']=$this->_uname;
		$_SESSION['project']=$this->_projectName;
		$query="UPDATE Accounts SET sessionID='$this->_sessionID' where uname='$this->_uname'";
		mysql_query($query,$this->_con);
      	mysql_close($this->_con);
		header("Location:homePage.php");
    }
    else if($this->is_admin()) 
	{
        $this->_sessionID = sha1(date("D M j G:i:s T Y"));
        $_SESSION['SessionID']=$this->_sessionID;
		$query="UPDATE Accounts SET sessionID='$this->_sessionID' where uname='$this->_uname'";
		mysql_query($query,$this->_con);
	    mysql_close($this->_con);
		header("Location:/lag/admin/adminHome.php");
	}
   }  
};


?>
