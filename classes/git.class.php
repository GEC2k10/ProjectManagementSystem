<?php	
	class git
	{
		private $_con,$_student;

		public function __construct()
		{
			session_start();
			require_once("database.class.php");
			$this->_con=new Database;
			$token=$_SESSION['uname'];
			if($this->_con->checkCookie($_SESSION['sessionID'],$token)==0)
			{
				$this->_con->close();
				header("location:/views/loginwrong.html");
			}
		}

		public function upload()
		{
			if($_SESSION['uname']==$_SESSION['projectName'])
				header("location:/views/loginwrong.html");
			$target=$_POST['directory'];
			if($target[strlen($target)-1]!='/')
				$target=$target.'/';
			$count=0;
			foreach ($_FILES['file']['name'] as $filename) 
			{
				$temp=$target;
				$tmp=$_FILES['file']['tmp_name'][$count];
				$count=$count + 1;
				$temp=$temp.basename($filename);
				if(move_uploaded_file($tmp,$temp))
				{	
					$this->_con->query("INSERT INTO messages VALUES('$filename uploaded successfully!!!')");
					$query="
					INSERT INTO Contributions VALUES('$_SESSION[uname]','$_SESSION[projectName]','$temp',NOW(),'0')";
					$this->_con->query($query);
				}
				else
					$this->_con->query("INSERT INTO messages VALUES('$filename upload failed!!!')");
				$temp='';
				$tmp='';
			}
			header("location:/views/upload.php");
		}

		public function commit()
		{
			if($_SESSION['uname']!=$_SESSION['projectName'])
				header("location:/views/loginwrong.html");
			$message=$_POST['commitMessage']."\nEOC";
			chdir("/var/www/repos/$_SESSION[projectName]");  // project name is passed to this script
			exec("git init ");
			exec("git add * ");
			exec("git commit -am '$message'",$a); // commits with an message 'message' 
			if($a[0][0]=='[')
			{
				$this->_con->query("INSERT INTO messages VALUES('Commited Succesfully!!!!')");
				$head=substr($a[0],strpos($a[0],']')-7,7);
				$this->_con->query("
				INSERT INTO Contributions VALUES('$_SESSION[projectName]','$_SESSION[projectName]','$head',NOW(),'1')");
				$this->_con->query("UPDATE Contributions SET commit='1' WHERE projectName='$_SESSION[projectName]'");
			}
			else
				$this->_con->query("INSERT INTO messages VALUES('Nothing to Commit!!!')");
			header("location:/views/guide.php");
		}
		public function checkout()
		{
			if($_SESSION['uname']!=$_SESSION['projectName'])
				header("location:/views/loginwrong.html");
			chdir("/var/www/repos/$_SESSION[projectName]/");
			exec("git describe --contains --all HEAD",$cur);
			exec("git checkout $_GET[version]");
			$this->download();
			chdir("/var/www/repos/$_SESSION[projectName]");
			exec("git checkout $cur[0]");
		}
		public function download()
		{
			chdir("/var/www/repos/");
			exec("zip -r ../downloads/$_SESSION[sessionID].zip $_SESSION[projectName]");
			chdir("/var/www/downloads/");
			header( "Content-Disposition: attachment; filename=$_SESSION[sessionID].zip" ); 
			readfile("$_SESSION[sessionID].zip");
		}
		public function branch()
		{
			if($_SESSION['uname']!=$_SESSION['projectName'])
				header("location:/views/loginwrong.html");
			if(strlen($_POST['branch'])==0)
			{
				$this->_con->query("INSERT INTO messages VALUES('Field branch name cannot be left empty!!')");
				header("location:/views/branch.php");
				exit;
			}
			chdir("/var/www/repos/$_SESSION[projectName]/");
			exec("git checkout -b $_POST[branch] $_POST[version]");
			$this->_con->query("INSERT INTO messages VALUES('Checked out to branch $_POST[branch] at $_POST[version]')");
		}

			
		public function __destruct()
		{
			$this->_con->close();
		}
			
	}
?>
