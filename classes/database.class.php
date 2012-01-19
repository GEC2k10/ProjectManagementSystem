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
		public function checkCookie($ssid) {
			if ($this->query("SELECT uname FROM Accounts WHERE sessionID='$ssid'")==0)
				return 0;
			return 1;
		}

		public function close()
		{
			mysql_close($this->_con);  // detatches the connection 
		}
	};
?>


