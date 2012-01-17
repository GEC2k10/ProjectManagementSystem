<?php

class Guide
{
  private $_con,$_reply,$_rows;
  private $_members,$_link,$_temp,$_projectName;

  public function __construct($projname)
  {
     $this->_projectName = $projname;
	 require_once("database.class.php");
	 $this->_con=new Database;
     $this->_reply=$this->_con->query(sprintf("
	 SELECT uname FROM Accounts WHERE projectName = '%s'",$projname));
     while($this->_rows = mysql_fetch_array($this->_reply))
		if( $this->_rows["uname"]!= $projname)
	       $this->_members[] = $this->_rows["uname"];
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
 public function show_commits()
 {
 	$this->_reply=$this->_con->query("
	SELECT Contribution FROM Contributions WHERE Username='$this->_projectName'");
	while($this->_row=mysql_fetch_array($this->_reply)
	{
		echo "
		<div class=contri>
			";
	}
}


 	
 }

 public function show_commit_button()
 {
   	echo "<div class='commit'>";
	echo "<form action='../controllers/gitCommands/commit.php' method='post'>";
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
