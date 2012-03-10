<?php
	class page
	{
		public function __construct($title)
		{
			$page="
			<html>
			<title>$title</title>
			<h1>$title</h1>
			<body bgcolor=#cfcfcf>
				<form method=post action=/controllers/homePage.php>
