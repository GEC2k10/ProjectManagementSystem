<?php
class Guide
{
	private $_con;
	private $_members,$_link,$_temp,$_projectName;

	public function __construct($projname)
	{
	   	$this->_projectName = $projname;
		require_once("database.class.php");
		$this->_con=new Database;
		$reply=$this->_con->query(sprintf("
		SELECT uname FROM Accounts WHERE projectName = '%s'",$projname));
		while($rows = mysql_fetch_array($reply))
			if( $rows["uname"]!= $projname)
			 	$this->_members[] = $rows["uname"];
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
		$reply=$this->_con->query("
		SELECT 
		uname,Contribution,Date 
		FROM Contributions WHERE projectName='$this->_projectName' AND commit='0'");
   		echo "<div class='commit'>\n";
		echo "<form action='../controllers/gitCommands/commit.php' method='post'>\n";
		echo "<center>Enter Commit message:</center>\n <br><br>\n";
		echo "<center><textarea name='commitMessage' rows=10 cols=55>\n";
		echo "Commit time :".date("D M j G:i:s T Y");
		while($row=mysql_fetch_assoc($reply))
			echo "
			\n$row[uname] uploaded ".substr($row['Contribution'],15+strlen($_SESSION['projectName']))." on $row[Date]";
		echo "</textarea></center>\n";
	   	echo "<center><input type='submit' value='Commit All'></center><br/><br>\n";
		echo "</form>\n";
	   	echo"</div>\n";
	}
	public function show_panel_button()
	{
		echo "
		<a href=/views/guidePanel.php style=top:150px;right:50px;position:absolute> 
		<input type=submit value='Control Panel' style=height:55px>
		</a>";
	}

};
?>
