<?php
ob_start();
session_start();
if(isset($_SESSION['admin'])){
unset($_SESSION['admin']);
$_SESSION['msg']='<div class="alert alert-success" role="alert">Successfully logged out.</div>';
header("location: ../login.php");
}
else{
$_SESSION['msg']='<div class="alert alert-danger" role="alert">Login to continue.</div>';
header("location: ../login.php");
}
?>