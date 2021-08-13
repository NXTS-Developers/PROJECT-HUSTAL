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
$mail->Subject='Forget Password'; 
$host=$_SERVER['HTTP_HOST'];
$link="https://$host/clientarea/reset.php?uid=$uid&key=$key&reset=true";
$newaccount="
<div class='container' style='margin-left:5%;margin-right:5%;margin-top:5%;'>
<div style='border-radius:1px solid grey;border-radius:5px;box-shadow:1px 1px 5px grey;padding:20px;font-family: Arial, Helvetica, sans-serif;'>
<h2 style='text-align:center;color:orange;'><b>Reset Password</b></h2><hr>
<h3>Hi there,</h3><p>You have requested a password reset if you have not requested a password reset please let us know by replying this email.</p><br>
<center><a href='$link' style='text-decoration:none;border:white;color:#fff;padding:10px 20px 10px 20px;background:orange;border-radius:5px;'>Reset Password</a></center>
<br>
<p>After changing password please login to your account❤</p>
<p>Regards ".SITE_NAME."</p>
<hr>
<h4 style='text-align:center;'><b>Need our help?</b></h4><p style='text-align:center'><a href='https://$host/contact.php' style='color:orange;text-decoration:none;margin:0;'>We are here to help you out!</a></p>
</div>
</div> ";
$mail->Body=$newaccount;
$mail->send();
?>