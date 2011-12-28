<?php

class Guide
{
  private $_con,$_query,$_reply,$_rows;
  private $_members,$_link,$_temp,$_projectName;

  public function __construct($projname)
  {
     $this->_projectName = $projname;
     $this->_con = mysql_connect("localhost","root","password");
     mysql_select_db("GitRepo",$this->_con);
     $this->_query = sprintf("select * from Accounts where projectName = '%s'",$projname);
     $this->_reply = mysql_query($this->_query,$this->_con);
     while($this->_rows = mysql_fetch_array($this->_reply))
     {
	if( $this->_rows["uname"]!= $this->_rows["projectName"] ) //This avoids the guide from being listed as the member of the project himself/herself
	       $this->_members[] = $this->_rows["uname"];
     }
      $this->_temp="<a href =../views/showusers.php?uname=%s> %s </a><br/> "; 
  }  
  public function show_members()
  {
     
     echo "<div class='members'>";
     while(list($index,$member) = each($this->_members))
     {
       $this->_link = sprintf($this->_temp,$member,$member);
       echo $this->_link;
     }
     echo "</div>";  
}

 public function show_commit_button()
 {
   	echo "<div class='commit'>";
	echo "<form action='../controllers/gitCommands/commit.php' method='post'><br/>";
	echo "<center>Enter Commit message:</center> <br><br>";
	echo "<input type='hidden' value='$this->_projectName' name='projectName'>";
	echo "<center><textarea name='commitMessage' rows=10 cols=40>";
	echo "Commit time :".date("D M j G:i:s T Y")."</textarea></center><br><br>";
    echo "<center><input type='submit' value='Commit All'></center><br/><br>";
    echo "</form>";
    echo"</div>";
  }
};
?>
