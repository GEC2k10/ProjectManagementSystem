<?php
	class email
	{
		private $_from,$_to,$_body,$_subject,$_username,$_password;
		private $_con;
		public function __construct($body_id=0,$uname=0,$passwd=0)
		{
			$this->_from="APTS <gecgitrepository@gmail.com>";
			$this->_username="gecgitrepository@gmail.com";
			$this->_password="importre";
			session_start();
			require_once("database.class.php");
			require_once("Mail.php");
			$this->_con=new Database;
			if($this->_con->checkCookie($_SESSION['sessionID'],$_SESSION['projectName'])==0 &&
			$this->_con->checkCookie($_SESSION['sessionID'],"admin")==0)
			{
				$this->_con->close();
				header("location:/views/loginwrong.html");
			}
			$invitation="
This is a computer generated Email.Please note that replies to this address 
may not be monitered.You have received this mail as you have registered in 
GEC Project Tracker.

Here are your account details:
	Username	:		%s 
	Password	:		%s 
If you have no idea what is happening,please ignore this mail.Some body might
have entered your Mail ID by mistake.";
			$branch_notify="
This is a computer generated mail from The Academic Project Tracker,GEC Thrissur.

The project guide for the project '%s' has reset the project to a previous 
version.Please get in touch with the respective guide for further information.
However,you may request your guide to reset to the newer version if necessary.

Also please download the current version from the website.Any further development
must be centered on that version.";
			if($body_id==1)
			{
				$this->_body=sprintf($invitation,$uname,$passwd);
				$this->_subject="Academic Project Tracker account details";
			}
			else if($body_id==2)
			{
				$this->_body=sprintf($branch_notify,$_SESSION['projectName']);
				$this->_subject="Project Tracker Notification";
			}
			else if($body_id==3)
			{
				$this->_body=$_POST['body'];
				$this->_subject=$_POST['subject'];
			}

		}

		public function sendMail($to)
		{
			$this->_to=$to;
    	    $host = "ssl://smtp.gmail.com";
        	$port = "465";
    	    $headers = array ('From' => $this->_from,
        	  'To' => $this->_to,
	          'Subject' => $this->_subject);
    	    $smtp = Mail::factory('smtp',
        	array ('host' => $host,
            	'port' => $port,
	            'auth' => true,
    	        'username' => $this->_username,
        	    'password' => $this->_password));
	        $mail = $smtp->send($this->_to, $headers, $this->_body);
    	    if (PEAR::isError($mail)) 
				$this->_con->query("INSERT INTO messages VALUES('$mail->getMessage()'");
			else
				$this->_con->query("INSERT INTO messages VALUES('Mail sent to $this->_to')");
		}
	};
?>
