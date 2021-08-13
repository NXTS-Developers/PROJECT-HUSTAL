<?php
require '../../vendor/phpmailer/PHPMailerAutoload.php'; 
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
$mail->addAddress($email);
$mail->addReplyTo(MAIL_USER,SITE_NAME);
$mail->WordWrap=10000;
$mail->isHTML(true);
$mail->Subject='Account Suspended'; 
$deactivate="
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
<h3>Dear Client!</3>
<p class='text-muted'>You free hosting account have been Suspended due to resources limit or abuse and all of the data including files filders and all of your domain and database will be prevoked and will be deleted permanently.
<br><br>
Best Regards ".SITE_NAME."
</p>";
$mail->Body=$deactivate;
$mail->send();
?>