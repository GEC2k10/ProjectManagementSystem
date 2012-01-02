<?php
	class Database
	{
		private $_con;

		public function connect()
		{
			$this->_con=mysql_connect("localhost","root","password");
			mysql_select_db("GitRepo",$this->_con);
		}

		public function query($query)
		{
			$reply=mysql_query($query);
			if(mysql_num_rows($reply)==0)
				return 0;
			else
				return $reply;
		}

		public function close()
		{
			mysql_close();
		}
	};
?>


