<?php
$title="Ticket #".$_GET['tid'];
$desc="";
include "includes/header.php";
$ticket=mysqli_fetch_assoc(mysqli_query($connect,"select * from vhost_ticket where ticket_id='".$_GET['tid']."'"));
$usr=mysqli_fetch_assoc(mysqli_query($connect,"select * from vhost_client where client_id='".$ticket['client_id']."'"));
?><br>
<h3 class="text-center"><b>Ticket #<?php echo $_GET['tid'];?></b></h3>
<div class="container"><br>
<?php
if(isset($_SESSION['msg'])){
echo $_SESSION['msg'];
unset($_SESSION['msg']);
}
?>
<div class="card">
<div class="card-header">
Subject: <?php echo $ticket['ticket_subject'];?>
</div>
<div class="card-body">
<p class="text-muted"><?php echo $ticket['ticket_content'];?></p>
</div>
<div class="card-footer">
<small class="text-muted">by <?php echo $usr['client_name']?> on <?php echo $ticket['ticket_date'];?> at <?php echo $ticket['ticket_time'];?></small>
</div>
</div>
<?php
$sql=mysqli_query($connect,"select * from vhost_ticket_reply where ticket_id='".$_GET['tid']."' order by reply_id asc");
if(mysqli_num_rows($sql)>0){
while($app=mysqli_fetch_assoc($sql)){
if($app['reply_by']==0){
$r="Staff";
}
else{
$r=$usr['client_name'];
}
?><br>
<div class="card">
<div class="card-header">
Reply to #<?php echo $_GET['tid'];?>
</div>
<div class="card-body">
<p class="text-muted"><?php echo $app['reply_content'];?></p>
</div>
<div class="card-footer">
<small class="text-muted">by <?php echo $r;?> on <?php echo $app['reply_date'];?> at <?php echo $app['reply_time'];?> </small>
</div>
</div>
<?
}
}
?><br>
<div class="card">
<div class="card-header">
Reply to Ticket
</div>
<div class="card-body">
<form action="" method="post">
<div class="mb-3">
<textarea class="form-control" id="reply" name="reply" placeholder="Reply to ticket...">
</textarea>
<input type="hidden" value="<?php echo $_GET['tid']?>" name="tid">
</div>
<div class="d-grid">
<input type="submit" name="send" class="btn btn-outline-success" value="SEND">
</div>
</form>
<form action="" method="post">
<div class="d-grid">
<input type="hidden" value="<?php echo $_GET['tid']?>" name="tid">
<input type="submit" name="close" class="btn btn-outline-warning" value="CLOSE">
</div>
</form>
</div>
</div><br>
</div>
</div>
<?php
if(isset($_POST['send'])){
$sql=mysqli_query($connect,"insert into vhost_ticket_reply(ticket_id,reply_by,reply_content,reply_date,reply_time) values ('".$_POST['tid']."','0','".$_POST['reply']."','".date("d-m-Y")."','".date("h:i a")."')");
$sql=mysqli_query($connect,"update vhost_ticket set ticket_status='1' where ticket_id='".$_POST['tid']."'");
if($sql>0){
include "mail/ticket.php";
$_SESSION['msg']='<div class="alert alert-success" role="alert">Reply added successfully.</div>';
header("location: ./ticket.php?tid=".$_POST['tid']."");
}
else{
$_SESSION['msg']='<div class="alert alert-danger" role="alert">Something wents wrong.</div>';
header("location: ./ticket.php?tid=".$_POST['tid']."");
}
}
if(isset($_POST['close'])){
$sql=mysqli_query($connect,"update vhost_ticket set ticket_status='2' where ticket_id='".$_POST['tid']."'");
if($sql>0){
include "mail/closeticket.php";
$_SESSION['msg']='<div class="alert alert-success" role="alert">Ticket C
closed successfully successfully.</div>';
header("location: ./ticket.php?tid=".$_POST['tid']."");
}
else{
$_SESSION['msg']='<div class="alert alert-danger" role="alert">Something wents wrong.</div>';
header("location: ./ticket.php?tid=".$_POST['tid']."");
}
}
?>