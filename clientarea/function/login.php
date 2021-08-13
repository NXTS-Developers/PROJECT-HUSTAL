<?php
include "connect.php";
if(isset($_POST['login'])){
$sql=mysqli_query($connect,"select client_password from vhost_client where client_email='".$_POST['email']."'");
if(mysqli_num_rows($sql)>0){
$res=mysqli_fetch_assoc($sql);
if(password_verify($_POST['password'],$res['client_password'])){
if(!empty($_POST['check'])){
setcookie("client",$_POST['email'],time()+84600,"/");
}
else{
setcookie("client",$_POST['email'],time()+86400*30,"/");
}
header("location: ../home.php");
}
else{
$_SESSION['msg']='<div class="alert alert-danger" role="alert">Invalid email or password</div>';
header("Location: ../login.php");
}
}
else{
$_SESSION['msg']='<div class="alert alert-danger" role="alert">Account doesnt exist.</div>';
header("Location: ../login.php");
}
}
?>