<?php
require '../vendor/phpmailer/PHPMailerAutoload.php'; 
$mail=new PHPMailer;
$mail->SMTPDebug=false;
$mail->isSMTP();
$mail->Host=MAIL_HOST;
$mail->SMTPAuth=true;
$mail->Username=MAIL_USER;
$mail->Password=MAIL_PASS;
$mail->SMTPSecure='tls';
$mail->Port=MAIL_PORT;
$mail->From=MAIL_USER;
$mail->FromName=SITE_NAME; 
$mail->addAddress($usr['client_email']);
$mail->addReplyTo(MAIL_USER,SITE_NAME);
$mail->WordWrap=10000;
$mail->isHTML(true);
$mail->Subject='Ticket #'.$_POST['tid']; 
$newaccount="
<html>
<head>
<meta name='viewport' content='width=device-width'>
<style>
*{
padding:0;
margin:0;
}
.text-muted{
color:#4e4e4e;
}
h3{
color:#000406;
}
</style>
</head>
<h3>Dear Client!</h3>
<p class='text-muted'>You have a new reply from the staff please check your clientarea Thank you!
</p>
<br>
<br>
Immortal Support
</p>
</body>
</html> ";
$mail->Body=$newaccount;
$mail->send();
?>