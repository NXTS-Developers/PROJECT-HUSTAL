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
$mail->Subject='Account Created'; 
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
<p class='text-muted'>You have created new free web hosting account from our service EraHost and we hope you will use our service according to the guidelines given in the TOS page</p>

<h3>Account Information</h3>
<p class='text-muted'><b>cPanel Username: </b>$uname<br>
<b>cPanel Password: </b>$passwd<br>
<b>cPanel URL: </b>https://cpanel.erahost.ml<br><br>
<h3>FTP Information</h3>
<p class='text-muted'><b>FTP Username: </b>$uname<br>
<b>FTP Password: </b>$passwd<br>
<b>FTP Hostname: </b>ftpupload.net<br>
<b>FTP Port: </b>21<br><br>
<h3>MySQL Information</h3>
<p class='text-muted'><b>MySQL Username: </b>$uname<br>
<b>MySQL Password: </b>$passwd<br>
<b>MySQL Hostname: </b>sql112.erahost.ml<br>
<b>MySQL Port: </b>3306<br><br>

<h3>Nameservers Information</h3>
<p class='text-muted'>You need to set your domain nameservers to given nameservers<br>
<b>NS1: </b>ns1.flexhost.ga<br>
<b>NS2: </b>ns2.flexhost.ga<br>
<br>
Best Regards EraHost
</p>
</body>
</html> ";
$mail->Body=$newaccount;
$mail->send();
?>