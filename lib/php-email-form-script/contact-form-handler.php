<?php 
$errors = '';
$myemail = 'phiifibernard@gmail.com';//<-----Put Your email address here.

if(empty($_POST['name'])  || empty($_POST['email']) || empty($_POST['message'])){

    $errors .= "\n Error: all fields are required";
}

$name = $_POST['name']; 
$email_address = $_POST['email']; 
$email_subject = $_POST['subject'];
$message = $_POST['message']; 

if (!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i", $email_address))
{
    $errors .= "\n Error: Invalid email address";
}


//Emailing the form data to my mail
 if( empty($errors)){ 
	$to = $myemail; 
	$subject = "Contact form submission: $email_subject";
	$email_body = "You have received a new message. ".
	" Here are the details:\n Name: $name \n Email: $email_address \n Message \n $message"; 
	
	$headers = "From: $email_address\n"; 
	$headers .= "Reply-To: $email_address";
	
	mail($to,$subject,$email_body,$headers);
	
	//redirect to the 'thank you' page
	header('contact-form-thank-you.html');
} 
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd"> 
<html>
<head>
	<title>Contact form handler</title>
</head>

<body>
<!-- This page is displayed only if there is some error -->
<?php
echo nl2br($errors);
?>


</body>
</html>