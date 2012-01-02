<?php
	class Database
	{

		public function connect()
		{
			mysql_connect("localhost","root","password");
			mysql_select_db("GitRepo");
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


