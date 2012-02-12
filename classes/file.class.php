<?php
class File
{
	private $_handle,$_filename,$_con;
  	public function __construct($filename)
	{
		require_once("database.class.php");
		$this->_con=new Database(); 
		$this->_filename=$filename;
		if(!file_exists($filename))
		{
			echo $filename;
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

	public function show_contribution_dates($filename,$username)
	{
	echo "Contribution Dates : <br/>";
	$reply=$this->_con->query(
	sprintf("SELECT Date from Contributions where uname=%s and Contribution='%s'",$username,$filename));
	$row=mysql_fetch_array($reply);
	echo $rows['Date'];
	}

	public function Delete($filename)
	{
		session_start();
		if (trim($filename)==trim("/var/www/repos/$_SESSION[projectName]/"))
		{
			chdir($filename);
			$this->_con->query("INSERT INTO messages VALUES('$filename deleted succesfully!!!')");
			exec("rm -rf *");
		}
		else 
		{
			if(!exec("rm -rf $filename"))
				$this->_con->query("INSERT INTO messages VALUES('$filename deleted succesfully!!!')");
			else
				$this->_con->query("INSERT INTO messages VALUES('$filename doesn't exist!!!')");
		}
	}
	public function __destruct()
	{
		$this->_con->close();
	    fclose($this->_handle);
	}
};
?>
