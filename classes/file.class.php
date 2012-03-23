<?php
include("../config.php");
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
			echo "
			<h1 align=center> Sorry the file not found ,or might have Issues !!!! </h1><br/>"; 
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
	public function download_button()
	{
		session_start();
		echo "
		<form action=/controllers/download.php method=post style=display:inline;>
		<input type=hidden value=$this->_filename name=file style=display:inline;>
		<input type=submit value='Download This File' style=height:25px;display:inline;>
		</form>";
		if ($_SESSION['uname']==$_SESSION['projectName'])
		{
		$file=substr($this->_filename,2*strlen($_SESSION['projectName'])+17);
		echo "
		<form action=/controllers/gitCommands/changesToFile.php method=get style=display:inline;>
		<input type=hidden value=$file name=filename style=display:inline;>
		<input type=submit value='Diff This File' style=height:25px;display:inline;>
		</form>
		";
		}
	}


	public function Delete($filename)
	{
		session_start();
		$name=substr($filename,strlen($PROJECT_ROOT));
		if (trim($filename)==trim($PROJECT_ROOT))
		{
			chdir($filename);
			$this->_con->query("INSERT INTO messages VALUES('$name deleted succesfully!!!')");
			exec("rm -rf *");
		}
		else 
			if(!exec("rm -rf '$filename'"))
			{
				$this->_con->query("
				INSERT INTO messages VALUES('$name deleted succesfully!!!')");
				$this->_con->query("
				UPDATE Contributions SET commit='1' WHERE Contribution='$filename'");
			}
	}
	public function __destruct()
	{
		$this->_con->close();
	    fclose($this->_handle);
	}
};
?>
