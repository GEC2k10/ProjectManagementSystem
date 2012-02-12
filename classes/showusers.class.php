<?php
class ShowUsers
{
	private $_con ,$_reply,$_rows;
	private $_memberName,$_query,$_files,$_link,$_temp,$_dates;
	public function __construct($member)
	{
    	$this->_memberName = $member;
		require_once("database.class.php");
    	$this->_con = new Database;
	    $this->_reply=$this->_con->query(sprintf("
		SELECT DISTINCT Contribution,Date 
		FROM Contributions WHERE uname='%s' AND commit='0'",$this->_memberName));
		$this->_con->close();
		while($this->_rows = mysql_fetch_array($this->_reply))
	    {
			$this->_files[] = substr($this->_rows['Contribution'],15);  /* File name field of user table */  
			$this->_dates[] = $this->_rows['Date'];       /* Date field */
	    }  
    	$this->_temp ="<a href='../views/showfile.php?filename=%s&uname=%s'>%s</a>\n";
	}  
	public function show_files($username)
	{
    	$i=0;
	    echo "<table border=\"1\">\n";
    	echo "<tr><th>File</th><th>Date of Contribution</th></tr>\n";
	    while(list($index,$file) = each($this->_files))
    	{
        	echo"<tr>";
			$this->_link=sprintf($this->_temp,$file,$username,$file);
			echo "<td>".$this->_link."</td><td>".$this->_dates[$i]."</td>\n";
	        echo "</tr>\n";
    	}
	  	echo "</table>\n";
	}	
	public function __destruct()
	{
	    mysql_close($this->_con);
	}
};
?>
