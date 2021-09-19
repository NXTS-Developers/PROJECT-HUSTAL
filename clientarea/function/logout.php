<?php
ob_start();
session_start();
if(isset($_COOKIE['client'])&&$_COOKIE['client']!='NULL'){
setcookie("client",NULL,-1,"/");
$_SESSION['msg']='<div class="alert alert-success" role="alert">Successfully logged out.</div>';
header("location: ../login.php");
}
else{
$_SESSION['msg']='<div class="alert alert-danger" role="alert">Login to continue.</div>';
header("location: ../login.php");
}
?>
