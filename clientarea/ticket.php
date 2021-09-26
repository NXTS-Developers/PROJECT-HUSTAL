<?php
$title="Ticket #".$_GET['tid'];
$desc="";
include "includes/header.php";
$sl=mysqli_query($connect,"select * from vhost_ticket where ticket_id='".$_GET['tid']."' and client_id='".$user['client_id']."'");
if(!mysqli_num_rows($sl)>0){
header('location: tickets.php');
}
$ticket=mysqli_fetch_assoc($sl);
?>
<h3 class="text-center"><b>Ticket #<?php echo $_GET['tid'];?></b></h3>
<div class="container"><br>
<?php
if(isset($_SESSION['msg'])){
echo $_SESSION['msg'];
unset($_SESSION['msg']);
}
?>
<div class="card shadow-sm rounded">
<div class="card-body">
<h3 class="text-center">Subject: <?php echo $ticket['ticket_subject'];?></h3><hr>
<p class="text-dark"><?php echo $ticket['ticket_content'];?></p><hr>
<div class="text-sm text-center">
<small class="text-muted">by <?php echo $user['client_name']?> on <?php echo $ticket['ticket_date'];?> at <?php echo $ticket['ticket_time'];?></small>
</div>
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
$r=$user['client_name'];
}
?><br>
<div class="card shadow-sm rounded">
<div class="card-body">
<h3 class="text-center">Reply to #<?php echo $_GET['tid'];?></h3><hr>
<p class="text-dark"><?php echo $app['reply_content'];?></p><hr>
<div class="text-sm text-muted">
<small class="text-muted">by <?php echo $r;?> on <?php echo $app['reply_date'];?> at <?php echo $app['reply_time'];?> </small>
</div>
</div>
</div>
<?
}
}
?><br>
<div class="card shadow-sm rounded">
<div class="card-body">
<h3 class="text-center">Reply to Ticket</h3><hr>
<?php if($ticket['ticket_status']<2){ ?>
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
<?php }else{ ?>
<p class="text-center text-muted">
You cannot reply to this ticket because this ticket had been closed. if you have any further questions please open another support ticket.
</p>
<?php } ?>
</div>
</div><br>
</div>
</div>
<?php
if(isset($_POST['send'])){
$sql=mysqli_query($connect,"insert into vhost_ticket_reply(ticket_id,reply_by,reply_content,reply_date,reply_time) values ('".$_POST['tid']."','1','".htmlentites($_POST['reply'])."','".date("d-m-Y")."','".date("h:i a")."')");
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
?>
