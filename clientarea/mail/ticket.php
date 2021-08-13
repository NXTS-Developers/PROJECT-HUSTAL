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
$mail->Subject='Ticket #'.$_POST['tid']; 
$host=$_SERVER['HTTP_HOST'];
$link="https://".$host."/clientarea/ticket.php?tid=".$_POST['tid'];
$newaccount="
 <div class='container' style='margin-left:5%;margin-right:5%;margin-top:5%;'>
<div style='border-radius:1px solid grey;border-radius:5px;box-shadow:1px 1px 5px grey;padding:20px;font-family: Arial, Helvetica, sans-serif;'>
<h2 style='text-align:center;color:orange;'><b>Ticket Reply</b></h2><hr>
<h3>Hi there,</h3><p>You would like to know that you have received a message from our support depatment to view full message click on the button below.</p><br>
<center><a href='$link' style='text-decoration:none;border:white;color:#fff;padding:10px 20px 10px 20px;background:orange;border-radius:5px;'>View Ticket</a></center>
<br>
<p>If you have any other question please let us know❤</p>
<p>Regards ".SITE_NAME."</p>
<hr>
<h4 style='text-align:center;'><b>Need our help?</b></h4><p style='text-align:center'><a href='https://$host/contact.php' style='color:orange;text-decoration:none;margin:0;'>We are here to help you out!</a></p>
</div>
</div> ";
$mail->Body=$newaccount;
$mail->send();
?>