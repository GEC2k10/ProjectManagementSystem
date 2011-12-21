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
       $this->_members[] = $this->_rows["uname"];
     }
      $this->_temp="<a href =../views/showusers.php?uname=%s> %s </a><br/> "; 
  }  
  public function show_members()
  {
     while(list($index,$member) = each($this->_members))
     {
       $this->_link = sprintf($this->_temp,$member,$member);
       echo $this->_link;
     }
  }

 public function show_commit_button()
 {
    echo "<form action='../controllers/gitCommands/commit.php' method='post'><br/>";
	echo "Enter Commit message: <br><br>";
	echo "<input type='hidden' value='$this->_projectName' name='projectName'>";
	echo "<textarea name='commitMessage' rows=10 cols=40>";
	echo "Commit message:Please comment about the current status of the project.</textarea><br><br>";
    echo "<input type='submit' value='Commit All'><br/><br>";
    echo "</form>";
 }
};
?>
