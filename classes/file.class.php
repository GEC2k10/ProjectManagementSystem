<?php
class File
{
  private $_handle,$_filename,$_con,$_reply,$_rows;
  
  public function __construct($filename)
  {
   $this->_filename=$filename;
   if(!file_exists($filename))
   {
     echo "<h1 align=center> Sorry the file not found ,or might have Issues !!!! </h1><br/>"; 
     exit; 
   } 
   $this->_handle=fopen($filename,"r");
      
  }
  public function show_file()
  {
    echo "<hr size=2>";
    highlight_file($this->_filename);
    echo "<hr size=2>";
  }
 public function show_contribution_dates($filename,$username) //This function will display the dates in which a particular user has contributed a particular file
 {
 require_once("../classes/database.class.php");
 echo "Contribution Dates : <br/>";
 $this->_con=new Database(); 
 $this->_reply=$this->_con->query(sprintf("SELECT Date from Contributions where Username=%s and Contribution='%s'",$username,$filename));
 while($this->_rows=mysql_fetch_array($this->_reply))
 {
  echo $this->_rows['Date'];
 }

 }
 public function Delete($filename)
 {
  session_start();
  $filename="/var/www/repos/".$_SESSION['project']."/".$filename;
 if(exec("rm -rf ".$filename))
 {
	$_SESSION['message']=$filename." deleted succesfully";
 }
 else
 {
	$_SESSION['message']=$filename."not exists";
 }
 header("location:../views/Deletefile.php");
 }
  public function __descruct()
  {
    fclose($this->_handle);
  }
};
?>
