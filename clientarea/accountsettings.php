<?php
$title="Settings";
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
<div class="card">
<div class="card-body">
<h3 class="text-center">Account Settings</h3><hr>
<form action="" method="post">
<div class="mb-3">
<input type="text" class="form-control" name="name" placeholder="Your Name" value="<?php echo $user['client_name'];?>">
</div>
<div class="mb-3">
<input type="password" class="form-control" name="newpassword" placeholder="Enter New Password" value="">
</div>
<div class="mb-3">
<input type="password" class="form-control" name="confirmpassword" placeholder="Confirm Password" value="">
</div>
<div class="d-grid">
<input type="submit" class="btn btn-outline-warning" name="update" value="Update Settings">
</div>
</form><hr>
<div class="text-sm text-muted text-center">
It can take upto 30 seconds
</div>
</div> 
</div>
<?php
if(isset($_POST['update'])){
if($_POST['newpassword']==$_POST['confirmpassword']){
if(!empty($_POST['newpassword'])){
$pass=password_hash($_POST['newpassword'],PASSWORD_BCRYPT);
}
else{
$pass=$user['client_password'];
}
$sql=mysqli_query($connect,"update vhost_client set client_name='".$_POST['name']."',client_password='".$pass."' where client_email='".$_COOKIE['client']."'");
if($sql>0){
$_SESSION['msg']='<div class="alert alert-success" role="alert">Settings updated successfully.</div>';
header("location: ./accountsettings.php");
}
else{
$_SESSION['msg']='<div class="alert alert-danger" role="alert">Something wents wrong.</div>';
header("location: ./accountsettings.php");
}
}
else{
$_SESSION['msg']='<div class="alert alert-danger" role="alert">Password doesnt match.</div>';
header("location: ./accountsettings.php");
}
}
?>
