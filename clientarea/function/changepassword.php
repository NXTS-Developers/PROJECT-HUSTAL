<?php
ob_start();
session_start();
require "../../vendor/autoload.php";
use \HansAdema\AnakeClient\Client;
include "connect.php";
// create account
if(isset($_POST['update'])){
// setting up array
$tsData=array(
'username'=>$_POST['username'],
'password'=>$_POST['password'],
);
$id=$_POST['aid'];
// alert client class 
$client=Client::create();
// alert create function
$request = $client->password([
'username'=>$tsData['username'],
'password'=>$tsData['password'],
'enabledigest'=>1,
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
if($result==0){
$_SESSION['msg']="<div class='alert alert-warning' role='alert'>".$response->getMessage()."</div>";
$sql=mysqli_query($connect,"update vhost_cpanel set cpanel_password='".$_POST['password']."' where cpanel_client_username='".$_POST['username']."'");
header("location: ../cpanelsettings.php?aid=$id");
}
if($result==1){
$sql=mysqli_query($connect,"update vhost_cpanel set cpanel_password='".$_POST['password']."' where cpanel_client_username='".$_POST['username']."'");
header("location: ../cpanelsettings.php?aid=$id");
}
if($result==2){
$_SESSION['msg']="<div class='alert alert-danger' role='alert'>Sorry something went's wrong.</div>";
header("location: ../cpanelsettings.php?aid=$id");
}
//end statment
}
?>