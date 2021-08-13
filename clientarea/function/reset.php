<?php
include "connect.php";
if(isset($_POST['reset'])){
$sql=mysqli_query($connect,"update vhost_client set client_password='".password_hash($_POST['newpassword'],PASSWORD_BCRYPT)."' where client_email='".$_POST['uid']."'");
if($sql>0){
$_SESSION['msg']='<div class="alert alert-success" role="alert">Password changed successfully</div>';
header("location: ../login.php");
}
else{
$_SESSION['msg']='<div class="alert alert-danger" role="alert">Something wents wrong.</div>';
header("location: ../login.php");
}
}
?>