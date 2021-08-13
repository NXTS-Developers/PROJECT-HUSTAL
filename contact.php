<?php
$title="Contact us";
$desc="You can contact our departments in case of any help needed in technical support system and mutual system with full classes and tutorials.";
include "includes/header.php";
?>
<div class="margin" style="margin-left:5%;margin-right:5%;">
<div class="row">
<div class="col-lg-8 col-md-8 col-sm-12"><br>
<div class="card"><br>
<div class="card-body">
<h4 class="text-center"><b>Contact US</b></h4>
<h6 class="text-center text-muted">Send message by filling up the form</h6>
<?php
if(isset($_SESSION['msg'])){
echo $_SESSION['msg'];
unset($_SESSION['msg']);
}
?>
<form action="./contact.php" method="post">
<div class="mb-3">
<input type="text" name="subject" class="form-control" placeholder="Enter Message Subject">
</div>
<div class="mb-3">
<input type="email" name="email" class="form-control" placeholder="Enter Email Address">
</div>
<div class="mb-3">
<select name="department" class="form-control" >
<option>General Department</option>
<option>Support Department</option>
<option>Request Feature</option>
<option>Admin Letter</option>
</select>
</div>
<div class="mb-3">
<textarea name="message" class="form-control" placeholder="Enter Message Body">
</textarea>
</div>
<div class="d-grid">
<button name="send" class="btn btn-success">SEND <i class="fa fa-send"></i></button>
</div>
</form> 
</div>
</div>
</div>
<div class="col-lg-4 col-md-4"><br>
<div class="card">
<div class="card-body">
<h5><b><i class="fa fa-envelope"></i> Email us:</b></h5> <h6><?php echo SITE_EMAIL?></h6>
<h5><b><i class="fa fa-phone"></i> Phone us:</b></h5><h6> <?php echo SITE_PHONE?></h6>
<h5><b><i class="fa fa-whatsapp"></i> WhatsApp:</b></h5><h6> +92 309 4428355</h6>
<h5 class="text-center">Company Location</h5>
<iframe width="100%" height="auto" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=en&amp;q=Ghaziabad,%20Lahore,%20Pakistan+(Ghaziabad)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>
</div>
</div><br>
</div>
</div>
</div>
<?php
include "includes/footer.php";
if(isset($_POST['send'])){
require_once "vendor/user_info/UserInfo.php";
$ip=UserInfo::get_ip();
require_once "vendor/phpmailer/PHPMailerAutoload.php";
$mail=new PHPMailer;
$mail->SMTPDebug=true;
$mail->isSMTP();
$mail->Host=MAIL_HOST;
$mail->SMTPAuth=true;
$mail->Username=MAIL_USER;
$mail->Password=MAIL_PASS;
$mail->SMTPSecure='tls';
$mail->Port=MAIL_PORT;
$mail->From=MAIL_USER;
$mail->FromName=SITE_NAME; 
$mail->addAddress('mahtabhassan159@gmail.com');
$mail->addReplyTo(MAIL_USER,SITE_NAME);
$mail->WordWrap=10000;
$mail->isHTML(true);
$mail->Subject=$_POST['subjuct']; 
$mail->Body="Email: ".$_POST['email']." <br>Department: ".$_POST['department']."<br>Message: ".$_POST['message']." <br> IP Address: ".$ip;
if($mail->send()){
$_SESSION['msg']='<div class="alert alert-success" role="alert">Message successfully sent!</div>';
header("Location: ./contact.php");
}
else{
$_SESSION['msg']='<div class="alert alert-danger" role="alert">Something wents wrong</div>';
header("Location: ./contact.php");
}
}
?>