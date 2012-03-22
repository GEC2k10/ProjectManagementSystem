<?php
	class git
	{
		private $_con,$_student;

		public function __construct()
		{
			session_start();
			require_once("database.class.php");
			if(!isset($_SESSION['uname']))
			{
				header("location:/views/loginwrong.html");
			}
			$this->_con=new Database;
		}

		public function upload()
		{
			include("$_SERVER[DOCUMENT_ROOT]/config.php");
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
			include("$_SERVER[DOCUMENT_ROOT]/config.php");
			if($_SESSION['uname']!=$_SESSION['projectName'])
				header("location:/views/loginwrong.html");
			$message=$_POST['commitMessage']."\nEOC";
			chdir($GIT_ROOT);
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
		public function checkoutDownload()
		{
			include("$_SERVER[DOCUMENT_ROOT]/config.php");
			if($_SESSION['uname']!=$_SESSION['projectName'])
				header("location:/views/loginwrong.html");
			chdir($GIT_ROOT);
			exec("git describe --contains --all HEAD",$cur);
			exec("git checkout $_GET[version]");
			$this->download();
			chdir($GIT_ROOT);
			exec("git checkout $cur[0]");
		}
		public function download()
		{
			include("$_SERVER[DOCUMENT_ROOT]/config.php");
			chdir($GIT_ROOT);
			exec("zip -r $DOWNLOAD$_SESSION[uname].zip $_SESSION[projectName]");
			chdir($DOWNLOAD);
			header( "Content-Disposition: attachment; filename=$_SESSION[uname].zip" ); 
			readfile("$_SESSION[uname].zip");
			exec("rm $_SESSION[uname].zip");
		}
		public function branch()
		{
			include("$_SERVER[DOCUMENT_ROOT]/config.php");
			if($_SESSION['uname']!=$_SESSION['projectName'])
				header("location:/views/loginwrong.html");
			if(strlen($_POST['branch'])==0)
			{
				$this->_con->query("INSERT INTO messages VALUES('Field branch name cannot be left empty!!')");
				header("location:/views/branch.php");
				exit;
			}
			chdir($GIT_ROOT);
			exec("git checkout -b $_POST[branch] $_POST[version]",$a);
			$this->_con->query("INSERT INTO messages VALUES('Checked out to branch $_POST[branch] at $_POST[version] $a[1]')");
		}
		public function checkout()
		{
			include("$_SERVER[DOCUMENT_ROOT]/config.php");
			if($_SESSION['uname']!=$_SESSION['projectName'])
				header("location:/views/loginwrong.html");
			chdir($GIT_ROOT);
			echo $GIT_ROOT;
			exec("git checkout $_POST[branch]");
			$this->_con->query("INSERT INTO messages VALUES('Checked out to branch $_POST[branch]')");
			header("location:/views/guide.php");
		}

		public function __destruct()
		{
			$this->_con->close();
		}
			
	}
?>
