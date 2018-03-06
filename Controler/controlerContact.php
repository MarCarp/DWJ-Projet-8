<?php
$title = 'testContact';

if(isset($_POST['message']))
{
	$to      = 'jean.forteroche@ecrivain.com';
	$subject = 'Contact';
	$message = $_POST['message'];
	$headers = 'From: jean.forteroche@ecrivain.com' . "\r\n" .
	'Reply-To: jean.forteroche@ecrivain.com' . "\r\n" .
	'X-Mailer: PHP/' . phpversion();

     mail($to, $subject, $message, $headers);
}

require 'Vue/vueContact.php';