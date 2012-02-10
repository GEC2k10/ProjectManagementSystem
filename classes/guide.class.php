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
		SELECT Contributions.uname,Contribution,Date FROM Contributions JOIN Accounts ON Contributions.uname=Accounts.uname WHERE Accounts.projectName='$this->_projectName' AND commit='0'");
   		echo "<div class='commit'>";
		echo "<form action='../controllers/gitCommands/commit.php' method='post'>";
		echo "<center>Enter Commit message:</center> <br><br>";
		echo "<input type='hidden' value='$this->_projectName' name='projectName'>";
		echo "<center><textarea name='commitMessage' rows=10 cols=55>";
		echo "Commit time :".date("D M j G:i:s T Y");
		while($row=mysql_fetch_assoc($reply))
			echo "\n$row[uname] uploaded ".substr($row['Contribution'],15+strlen($_SESSION['projectName']))." on $row[Date]";
		echo "</textarea></center>";
	    	echo "<center><input type='submit' value='Commit All'></center><br/><br>";
		echo "</form>";
	    	echo"</div>";
	}
	public function show_commits()
	{
		$reply=$this->_con->query("SELECT Date FROM Contributions WHERE uname='$this->_projectName'");
		echo "<div class=listCommits>";
		echo "Commits So far <br>";
		if($reply!=0)
			while($row=mysql_fetch_assoc($reply))
			{
				echo "
				<a href=../controllers/gitCommands/checkout.php?version=$row[Contribution]>";
				echo $row['Date']."<br></a>";
			}
		echo "</div>";
	}
};
?>
