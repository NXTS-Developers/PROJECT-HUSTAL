<?php
include "includes/connect.php";
if($_GET['activate']=='true'){
if($_GET['key']==md5($_GET['uid'])){
$sql=mysqli_query($connect,"update vhost_client set client_status='1' where client_email='".$_GET['uid']."'");
if($sql>0){
$_SESSION['msg']='<div class="alert alert-success" role="alert"> Account activated successfully</div>';
header("location: ./login.php");
}
else{
$_SESSION['msg']='<div class="alert alert-danger" role="alert"> Something wents wrong. </div>';
header("location: ./login.php");
}
}
}
?>