<?php
include "connect.php";
if(isset($_POST['signup'])){
$check=mysqli_query($connect,"select * from vhost_client where client_email='".$_POST['email']."'");
if(mysqli_num_rows($check)>0){
$_SESSION['msg']='<div class="alert alert-danger" role="alert"> Account already exist. </div>';
header("location: ../login.php");
}
else{
if($_POST['password']==$_POST['cpassword']){
$sql=mysqli_query($connect,"insert into vhost_client(client_name,client_email,client_password,client_status) values ('".$_POST['name']."','".$_POST['email']."','".password_hash($_POST['password'],PASSWORD_BCRYPT)."','0')");
if($sql>0){
$_SESSION['msg']='<div class="alert alert-success" role="alert"> Account Created successfully please check your email inbox</div>';
$key=md5($_POST['email']);
$uid=$_POST['email'];
include "../mail/signup.php";
header("location: ../login.php");
}
else{
$_SESSION['msg']='<div class="alert alert-danger" role="alert"> Something wents wrong. </div>';
header("location: ../login.php");
}
}
else{
$_SESSION['msg']='<div class="alert alert-danger" role="alert"> Password doesnt match </div>';
header("location: ../login.php");
}
}
}
?> 