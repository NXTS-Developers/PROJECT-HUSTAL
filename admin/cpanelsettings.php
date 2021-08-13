<?php
$title="Edit Settings - ".$_GET['aid'];
$desc="";
include "includes/header.php";
if(isset($_GET['aid'])){
$sql=mysqli_fetch_assoc(mysqli_query($connect,"select * from vhost_cpanel where cpanel_username='".$_GET['aid']."'"));
$usr=mysqli_fetch_assoc(mysqli_query($connect,"select client_email from vhost_client where client_id='".$usr['client_id']."'"));
?>
<div class="container"><br>
<?php
if(isset($_SESSION['msg'])){
echo $_SESSION['msg'];
unset($_SESSION['msg']);
}
if($sql['cpanel_status']==1){
?>
<div class="card">
<div class="card-body">
<h5 class="text-muted">Deactivate Account</h5><hr>
<form action="function/suspendcpanel.php" method="post" onsubmit="var text = document.getElementById('minle').value; if(text.length < 9) { alert('Reason Must be at least 10 digits long'); return false; } return true;">
<div class="mb-3">
<textarea name="reason" id="minle" class="form-control" placeholder="Reason of deactivation">
</textarea>
<input type="hidden" name="aid" value="<?php echo $_GET['aid'];?>">
<input type="hidden" name="email" value="<?php echo $usr['client_email'];?>">
</div>
<input type="hidden" name="username" value="<?php echo $sql['cpanel_client_username'];?>">
<input type="submit" name="deactivate" class="btn btn-danger" value="Deactivate Account">
</form><br>
<p class="text-muted">You account will be deleted after 30 days of your account deactivation and all of the account data will be removed completely.
</div>
</div>
<?php }else{ ?>
<div class="card">
<div class="card-body">
<h5 class="">Account Backup</h5><hr>
<p class="text-muted">Dear Admin if your client need a backup of this account please contact to ifast team in your cpanel support section thank you!</p>
</div>
</div>
</div>
<?php
}
}
?>