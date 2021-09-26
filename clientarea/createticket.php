<?php
$title="Create Ticket";
$desc="";
include "includes/header.php";
?>
<div class="container"><br>
<?php
if(isset($_SESSION['msg'])){
echo $_SESSION['msg'];
unset($_SESSION['msg']);
}
?>
<div class="card shadow-sm rounded">
<div class="card-body">
<h3 class="text-center">Create a new ticket</h3><hr>
<form action="" method="post">
<div class="mb-3">
<input type="text" class="form-control" name="subject" placeholder="Ticket Subject...">
</div>
<div class="mb-3">
<textarea class="form-control" name="content" placeholder="Ticket Content...">
</textarea>
</div>
<div class="d-grid">
<input type="submit" class="btn btn-outline-warning" name="add" value="Create Ticket">
</div>
</form><hr>
<div class="text-sm text-center text-muted">
It can take upto 2 hours before respond
</div>
</div>
</div>
<?php
if(isset($_POST['add'])){
$id=rand(00000000,99999999);
$sql=mysqli_query($connect,"insert into vhost_ticket(ticket_id,client_id,ticket_subject,ticket_content,ticket_date,ticket_time,ticket_status) values ('$id','".$user['client_id']."','".$_POST['subject']."','".htmlentities($_POST['content'])."','".date("d-m-Y")."','".date("h:i a")."','0')");
if($sql>0){
include "mail/newticket.php";
$_SESSION['msg']='<div class="alert alert-success" role="alert">Ticket created successfully.</div>';
header("location: ./ticket.php?tid=$id");
}
else{
$_SESSION['msg']='<div class="alert alert-danger" role="alert">Something wents wrong.</div>';
header("location: ./createticket.php");
}
}
?>
