<?php
$con = mysql_connect("localhost","root","mysql");
mysql_select_db("GitRepo",$con);
$query="select * from Accounts where uname=\"".$_POST["uname"]." \"; ";
$result=mysql_execute($query,$con);
$row = mysql_fetch_one($result);
if ($row[0] == " ")
{
  printf(" <br/> Invalid  Username <br/> ");
  exit();
}
else
{
  echo( " <form action



