<?php
require_once("Mail.php");
foreach($_POST['email']);
$from = "ATPS <gecgitrepository@gmail.com>";
$to = "$tmp";
$subject = "Confirmation Email from Academic Project Tracker";
$body = "
This is a computer generated Email.Please note that replies to this address may not be monitered.You have
received this mail as you have registered in  GEC Project Tracker.

Here are your account details:
	Username	:		%s 
	Password	:		%s 
If you have no idea what is happening,please ignore this mail.Some body might have entered your Mail ID by
mistake. ";

$host = "mail.example.com";
$username = "smtp_username";
$password = "smtp_password";

$headers = array ('From' => $from,
  'To' => $to,
  'Subject' => $subject);
$smtp = Mail::factory('smtp',
  array ('host' => $host,
    'auth' => true,
    'username' => $username,
    'password' => $password));

$mail = $smtp->send($to, $headers, $body);

if (PEAR::isError($mail)) {
  echo("<p>" . $mail->getMessage() . "</p>");
 } else {
  echo("<p>Message successfully sent!</p>");
 }
?>
