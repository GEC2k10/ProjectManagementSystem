<?php
/*  The Login class acting as the back end of Login.html 
 *  Establishes connection with database , fetches the 
 *  user information and  take appropriate action on the basis of it
 *  Last modified : 30/10/2011
 *  login.class.php
 */


class Login
{
  private $_uname,$_passwd,$_projectName,$_row,$_con;
  private $_sessionID;
  public function __construct($uname,$passwd)
  {
  	require_once("database.class.php");
    $this->_con=new Database;
    $this->_uname=mysql_real_escape_string(trim(substr($uname,0,30)));
    $this->_passwd=sha1($passwd);
    $query=sprintf("
	SELECT uname,projectName FROM Accounts WHERE uname='%s' AND passwd='%s'",$this->_uname,$this->_passwd);
    $reply=$this->_con->query($query);
    if($reply==0)
    { 
       $this->_con->close();
       header("Location:/lag/views/loginwrong.html");
       exit;
    }
    $this->_row = mysql_fetch_assoc($reply);
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
      	$this->_con->close();
		header("Location:../views/guide.php");  
		exit;
    }
    else if($this->is_user())
    {
        $this->_sessionID = sha1(date("D M j G:i:s T Y"));
        $_SESSION['sessionID']=$this->_sessionID;
        $_SESSION['uname']=$this->_uname;
		$_SESSION['projectName']=$this->_projectName;
		$query="UPDATE Accounts SET sessionID='$this->_sessionID' where uname='$this->_uname'";
		$this->_con->query($query);
      	$this->_con->close();
		header("Location:homePage.php");
    }
    else if($this->is_admin()) 
	{
        $this->_sessionID = sha1(date("D M j G:i:s T Y"));
        $_SESSION['sessionID']=$this->_sessionID;
		$query="UPDATE Accounts SET sessionID='$this->_sessionID' where uname='$this->_uname'";
		$this->_con->query($query);
      	$this->_con->close();
		header("Location:/lag/admin/adminHome.php");
	}
   }  
};


?>
