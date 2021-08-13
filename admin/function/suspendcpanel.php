<?php
ob_start();
session_start();
include "connect.php";
require "../../vendor/autoload.php";
use \HansAdema\AnakeClient\Client;
// create account
if(isset($_POST['deactivate'])){
// setting up array
$tsData=array(
'username'=>$_POST['username'],
'reason'=>$_POST['reason'],
);
$id=$_POST['aid'];
$email=$_POST['email'];
// alert client class 
$client=Client::create();
// alert create function
$request = $client->suspend([
'username'=>strtolower($tsData['username']),
'reason'=>$tsData['reason'],
]);
// sending request
$response=$request->send();
//receiving respond
if((int)$response->isSuccessful()==0&&strlen($response->getMessage())>1)
$result="0";
elseif((int)$response->isSuccessful()==1&&(int)$response->getMessage()==1)
$result="1";
elseif((int)$response->isSuccessful()==0&&(int)$response->getMessage()==0)
$result="2";
// showing results
$uname=$tsData['username'];
if($result==0){
$_SESSION['msg']="<div class='alert alert-warning' role='alert'>".$response->getMessage()."</div>";
$sql=mysqli_query($connect,"update vhost_cpanel set cpanel_status='3' where cpanel_client_username='".$_POST['username']."'");
include "../mail/deactivateaccount.php";
header("location: ../accounts.php");
}
if($result==1){
$sql=mysqli_query($connect,"update vhost_cpanel set cpanel_status='3' where cpanel_client_username='".$_POST['username']."'");
include "../mail/deactivateaccount.php";
header("location: ../accounts.php");
}
if($result==2){
$_SESSION['msg']="<div class='alert alert-danger' role='alert'>Sorry something went's wrong.</div>";
header("location: ../cpanelsettings.php?aid=$id");
}
//end statment
}
?>