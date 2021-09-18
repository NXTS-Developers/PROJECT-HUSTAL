<?php
$title="Edit Settings.php - ".$_GET['aid'];
$desc="";
include "includes/header.php";
if(isset($_GET['aid'])){
$sl=mysqli_query($connect,"select * from vhost_cpanel where cpanel_username='".$_GET['aid']."' and client_id='".$user['client_id']."'");
if(!mysqli_num_rows($sl)>0){
header('location: accounts.php');
}
$sql=mysqli_fetch_assoc($sl);
?>
<div class="container"><br>
<?php
if(isset($_SESSION['msg'])){
echo $_SESSION['msg'];
unset($_SESSION['msg']);
}
if($sql['cpanel_status']==1){
?>
<div class="card shadow-sm rounded">
<div class="card-body">
<form action="" method="post">
<h3 class="text-dark text-center">Account Label</h3><hr>
<div class="mb-3">
<label class="text-muted form-label">Account Label</label>
<input type="text" name="label" class="form-control" value="<?php echo $sql['cpanel_label']?>">
<input type="hidden" name="username" value="<?php echo $sql['cpanel_client_username'];?>"> 
<input type="hidden" name="aid" value="<?php echo $_GET['aid'];?>">
</div>
<input type="submit" name="update" class="btn btn-primary" value="Change Label">
</form>
</div>
</div>
<br>
<div class="card shadow-sm rounded">
<div class="card-body">
<form action="function/changepassword.php" method="post">
<h3 class="text-center">Change Password</h3><hr>
<div class="mb-3">
<label class="text-muted form-label">New Password</label>
<input type="password" pattern=".{8,35}" name="password" class="form-control" placeholder="New Password">
</div>
<input type="hidden" name="aid" value="<?php echo $_GET['aid'];?>">
<input type="hidden" name="username" value="<?php echo $sql['cpanel_client_username'];?>">
<input type="submit" name="update" class="btn btn-success" value="Change Password">
</form>
</div>
</div>
<br>
<div class="card shadow-sm rounded">
<div class="card-body">
<h3 class="text-center">Deactivate Account</h3><hr>
<form action="function/deactivateaccount.php" method="post" onsubmit="var text = document.getElementById('minle').value; if(text.length < 9) { alert('Reason Must be at least 10 digits long'); return false; } return true;">
<div class="mb-3">
<textarea name="reason" id="minle" class="form-control" placeholder="Reason of deactivation">
</textarea>
<input type="hidden" name="aid" value="<?php echo $_GET['aid'];?>">
</div>
<input type="hidden" name="username" value="<?php echo $sql['cpanel_client_username'];?>">
<input type="submit" name="deactivate" class="btn btn-danger" value="Deactivate Account">
</form><br>
<p class="text-muted">You account will be deleted after 30 days of your account deactivation and all of the account data will be removed completely.
</div>
</div><br>
<?php }else{ ?>
<div class="card shadow-sm rounded">
<div class="card-body">
<h5 class="">Reactivate Account</h5><hr>
<p class="text-muted">Deactivation of account cannot be undo you need to interact with staff inorder to get a full backup of your account</p>
<a href="createticket.php" class="btn btn-warning">Create Ticket</a>
</div>
</div> 
</div>
<?php
}
}
if(isset($_POST['update'])){
$sql=mysqli_query($connect,"update vhost_cpanel set cpanel_label='".$_POST['label']."' where cpanel_client_username='".$_POST['username']."'");
$id=$_POST['aid'];
if($sql>0){
$_SESSION['msg']="<div class='alert alert-success' role='alert'>Account label has been changed.</div>";
header("location: ./cpanelsettings.php?aid=$id");
}
else{
$_SESSION['msg']="<div class='alert alert-danger' role='alert'>Something wen'ts wrong.</div>";
header("location: ./cpanelsettings.php?aid=$id");
}
}
?>
