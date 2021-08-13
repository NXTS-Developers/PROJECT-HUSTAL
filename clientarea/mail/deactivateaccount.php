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
$mail->addAddress($_COOKIE['client']);
$mail->addReplyTo(MAIL_USER,SITE_NAME);
$mail->WordWrap=10000;
$mail->isHTML(true);
$host=$_SERVER['HTTP_HOST'];
$mail->Subject='Account Deactivated'; 
$deactivate="
 <div class='container' style='margin-left:5%;margin-right:5%;margin-top:5%;'>
<div style='border-radius:1px solid grey;border-radius:5px;box-shadow:1px 1px 5px grey;padding:20px;font-family: Arial, Helvetica, sans-serif;'>
<h2 style='text-align:center;color:orange;'><b>Deactivate Account</b></h2><hr>
<h3>Hi there,</h3><p>We had a good time with you while you were with us your account have been deactivate successfully and all files and database will be deleted within 30 days.</p><br>
<br>
<p>please create a new account if you want to host with us again❤</p>
<p>Regards ".SITE_NAME."</p>
<hr>
<h4 style='text-align:center;'><b>Need our help?</b></h4><p style='text-align:center'><a href='https://$host/contact.php' style='color:orange;text-decoration:none;margin:0;'>We are here to help you out!</a></p>
</div>
</div> ";
$mail->Body=$deactivate;
$mail->send();
?>