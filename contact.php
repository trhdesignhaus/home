<?php

if($_POST) {
    $name = "";
    $company = "";
    $email = "";
    $subject = "";
    $message = "";
    
    if(isset($_POST['name'])) {
      $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
    }
    
    if(isset($_POST['email'])) {
    	$email = str_replace(array("\r", "\n", "%0a", "%0d"), '', $_POST['email']);
    	$email = filter_var($email, FILTER_VALIDATE_EMAIL);
    }
    
    if(isset($_POST['subject'])) {
    	$email = filter_var($_POST['subject'], FILTER_SANITIZE_STRING);
    }
    
    if(isset($_POST['company'])) {
    	$company = filter_var($_POST['company'], FILTER_SANITIZE_STRING);
    }
    
    if(isset($_POST['message'])) {
    	$message = htmlspecialchars($_POST['message']);
    }
    
    $recipient = "maria.ilse.dovale@gmail.com";
       
    $headers  = 'MIME-Version: 1.0' . "\r\n"
    .'Content-type: text/html; charset=utf-8' . "\r\n"
    .'From: ' . $email . "\r\n";
    
    if(mail($recipient, $subject, $message, $headers)) {
    	echo "<p>Gracias por contactarte con nosotros, $name. Nos comunicaremos con vos en menos de 24 horas!</p>";
    } else {
    	echo '<p>Lo sentimos, nuestros conejos están perdidos y no pudieron enviar el mensaje :(.</p>';
    }
    
} else {
    echo '<p>Alguién cerró el agujero de conejo y no pudimos recibir tu mensaje! Vuelve a intentarlo.</p>';
}

?>