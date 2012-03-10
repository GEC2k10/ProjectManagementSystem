<?php
	class page
	{
		public function __construct($title)
		{
			$header="
				<html>
				<font face=ubuntu>
				<title>$title</title>
				<h1><center>$title</center></h1>
				<div style=top:5px;right:5px;position:absolute>
					<a href=/lag/controllers/homePage.php>
						<input type=submit value=Home style=display:inline>
					</a>
					<a href=/lag/controllers/logout.php>
						<input type=submit value=Logout style=display:inline>
					</a>
				</div>
				<body bgcolor=#cfcfcf>";
			echo $header;
		}
	};
?>



