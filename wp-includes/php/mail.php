<?php 

if(isset($_POST['email'])){
	$email = htmlspecialchars(trim($_POST['email']));
	$msg = "Demande de contact\n";
$msg .= "E-mail:\t$email\n";
$msg .= ".......\n\n";

$recipient = "contact@supinformatique.com";
$subject = "Quiz Alfa";

$mailheaders = "From: Mon site web<> \n";
$mailheaders .= "Reply-To: $CP\n\n";

mail($recipient, $subject, $msg, $mailheaders);

echo "<script>alert(\"Merci, on vas vous contacter au plus vite\")</script>";

}
echo "<meta http-equiv='"."refresh'"."content='0;url=../../index.php'>";

?> 
