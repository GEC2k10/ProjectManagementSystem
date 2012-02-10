<?php
	class Database
	{
		private $_con;

  		public function __construct() {
			$this->_con=mysql_connect("localhost","root","password");
			mysql_select_db("GitRepo",$this->_con);
		}

		public function query($query) {
			$reply=mysql_query($query);
			if(mysql_num_rows($reply)==0)		
				return 0;			
			else
    				return $reply;
		}
		public function checkCookie($ssid,$uname) {
			if ($this->query("SELECT uname FROM Accounts WHERE sessionID='$ssid' AND uname='$uname'")==0)
				return 0;
			return 1;
		}

		public function messageDump() {
			$reply=$this->query("SELECT * FROM messages");
			while($row = mysql_fetch_assoc($reply))
				$message=$message.$row['message']."\\n";
			if(strlen($message)>0)
			{
				echo "	<script type='text/javascript'>
						alert('$message');
						</script>";
			}
			$this->query("DELETE FROM messages");
		}

		public function close()
		{
			mysql_close($this->_con);  // detatches the connection 
		}
	};
?>


