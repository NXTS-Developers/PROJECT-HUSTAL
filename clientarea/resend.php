<?php
if(isset($_GET['uid'])){
include "../includes/config.php";
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
$mail->addAddress($_COOKIE['client']);
$mail->addReplyTo(MAIL_USER,SITE_NAME);
$mail->WordWrap=10000;
$mail->isHTML(true);
$mail->Subject='Activate Account'; 
$host=$_SERVER['HTTP_HOST'];
$link="https://".$_SERVER['HTTP_HOST']."/clientarea/activate.php?key=".md5($_GET['uid'])."&uid=".$_GET['uid']."&activate=true";
$mail->Body="
<div class='container' style='margin-left:5%;margin-right:5%;margin-top:5%;'>
<div style='border-radius:1px solid grey;border-radius:5px;box-shadow:1px 1px 5px grey;padding:20px;font-family: Arial, Helvetica, sans-serif;'>
<h2 style='text-align:center;color:orange;'><b>Activate Account</b></h2><hr>
<h3>Hi there,</h3><p>We'll like you to be a member of our service please click on the button below inorder to verify your account.</p><br>
<center><a href='$link' style='text-decoration:none;border:white;color:#fff;padding:10px 20px 10px 20px;background:orange;border-radius:5px;'>Confirm Account</a></center>
<br>
<p>After confirming account please login to your account❤</p>
<p>Regards ".SITE_NAME."</p>
<hr>
<h4 style='text-align:center;'><b>Need our help?</b></h4><p style='text-align:center'><a href='https://$host/contact.php' style='color:orange;text-decoration:none;margin:0;'>We are here to help you out!</a></p>
</div>
</div>
";
$mail->send();
header("location: home.php");
}
?>
