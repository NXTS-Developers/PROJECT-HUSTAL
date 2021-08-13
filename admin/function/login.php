<?php
include "connect.php";
if(isset($_POST['login'])){
$sql=mysqli_query($connect,"select admin_password from vhost_admin where admin_email='".$_POST['email']."'");
$res=mysqli_fetch_assoc($sql);
if(password_verify($_POST['password'],$res['admin_password'])){
$_SESSION['admin']=$_POST['email'];
header("location: ../home.php");
}
else{
$_SESSION['msg']='<div class="alert alert-danger" role="alert">Invalid email or password</div>';
header("Location: ../login.php");
}
}
?>