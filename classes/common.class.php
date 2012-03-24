<?php
	class page
	{
		public function __construct($title)
		{
			session_start();
			if($_SESSION['head_flag']=='admin')
				$home="/admin/views/adminHome.php";
			else
				$home="/controllers/homePage.php";
			$header="
				<html>
				<font face=ubuntu>
				<title>$title</title>
				<h1><center>$title</center></h1>
				<div style=top:5px;right:5px;position:absolute>
					<a href=$home>
						<input type=submit value=Home style=display:inline>
					</a>
					<a href=/controllers/logout.php>
						<input type=submit value=Logout style=display:inline>
					</a>
				</div>
				<body bgcolor=#cfcfcf vlink=blue>";
			echo $header;
		}
		
	};
?>



