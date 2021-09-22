<?php
ob_start();
session_start();
require "../../vendor/autoload.php";
use \HansAdema\AnakeClient\Client;
include "connect.php";
$s=mysqli_query($connect,"select * from vhost_cpanel where client_id='".$_POST['id']."' and cpanel_status=1");
if(mysqli_num_rows($s)<3){
// create account
if(isset($_POST['create'])){
// setting up array
$UserName=substr(str_shuffle('0123456789QWRTYUIOPELKJHGFDSAZXCVBNMzxcvbnmlkjhgfdsaqwertyuiop'),0,8);
$Password=substr(str_shuffle('0123456789QWRTYUIOPELKJHGFDSAZXCVBNMzxcvbnmlkjhgfdsaqwertyuiop'),0,16);
$tsData=array(
'username'=>$UserName,
'password'=>$Password,
'domain'=>$_POST['domain'],
'email'=>$_COOKIE['client'],
'plan'=>API_PLAN,
);
// alert client class 
$client=Client::create();
// alert create function
$request=$client->createAccount([
'username'=>$tsData['username'],
'password'=>$tsData['password'],
'domain'=>$tsData['domain'],
'email'=>$tsData['email'],
'plan'=>$tsData['plan']
]);
// sending request
$response=$request->send();
//receiving respond
if((int)$response->isSuccessful()==1&&strlen($response->getMessage())>1)
$result="1";
elseif((int)$response->isSuccessful()==0&&strlen($response->getMessage())>1)
$result="0";
elseif((int)$response->isSuccessful()==0&&(int)$response->getMessage()==0)
$result="2";
// showing results
$uname=$response->getVpUsername();
$passwd=$tsData['password'];
if($result==0){
$Message = $response->getData();
$_SESSION['msg']="<div class='alert alert-warning' role='alert'>".$Message['result']['statusmsg']."</div>";
header("location: ../accounts.php"); 
}
if($result==1){
$sql=mysqli_query($connect,"insert into vhost_cpanel(client_id,cpanel_username,cpanel_client_username,cpanel_password,cpanel_status,cpanel_date,cpanel_label,cpanel_domain) values ('".$_POST['id']."','".$response->getVpUsername()."','".$tsData['username']."','".$tsData['password']."','1','".date("d-m-Y")."','".$_POST['label']."','".strtolower($_POST['domain'])."')");
$_SESSION['msg']="<div class='alert alert-success' role='alert'>Account  created successfully</div>";
include "../mail/newaccount.php";
header("location: ../accounts.php"); 
}
if($result==2){
$_SESSION['msg']="<div class='alert alert-danger' role='alert'>Sorry something went's wrong.</div>";
header("location: ../createaccount.php");
}
//end statment
}
}
else{
$_SESSION['msg']="<div class='alert alert-danger' role='alert'>You have reached the limit of free accounts.</div>";
header("location: ../accounts.php");
}
?>
