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
$mail->addAddress(MAIL_USER);
$mail->addReplyTo(MAIL_USER,SITE_NAME);
$mail->WordWrap=10000;
$mail->isHTML(true);
$mail->Subject='New Ticket #'.$_POST['tid']; 
$host=$_SERVER['HTTP_HOST'];
$newaccount="
 <div class='container' style='margin-left:5%;margin-right:5%;margin-top:5%;'>
<div style='border-radius:1px solid grey;border-radius:5px;box-shadow:1px 1px 5px grey;padding:20px;font-family: Arial, Helvetica, sans-serif;'>
<h2 style='text-align:center;color:orange;'><b>New Ticket</b></h2><hr>
<h3>Hi there,</h3><p>You have created a support ticket we do love to reply you and help you in any case currently your ticket is under queue once our support department finds your ticket we will get in touch with you❤.</p>
<p>Regards ".SITE_NAME."</p>
<hr>
<h4 style='text-align:center;'><b>Need our help?</b></h4><p style='text-align:center'><a href='https://$host/contact.php' style='color:orange;text-decoration:none;margin:0;'>We are here to help you out!</a></p>
</div>
</div> ";
$mail->Body=$newaccount;
$mail->send();
?>