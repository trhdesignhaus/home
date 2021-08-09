<?php
if(!empty($_POST["send"])) {
	$name = $_POST["userName"];
	$company = $_POST["company"];
	$email = $_POST["userEmail"];
	$subject = $_POST["subject"];
	$message = $_POST["message"];

	$toEmail = "trhdesignhaus@gmail.com";
	$mailHeaders = "From: " . $name . "<". $email .">\r\n";
	if(mail($email, $company, $subject, $message, $mailHeaders)) {
	    $message = "Your contact information is received successfully.";
	    $type = "success";
	}
}
require_once "contact-view.php";
?>