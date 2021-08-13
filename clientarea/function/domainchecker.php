<?php
ob_start();
session_start();
require "../../vendor/autoload.php";
use \HansAdema\AnakeClient\Client;
include "connect.php";
// if domain checker is set
if(isset($_POST['check'])){
// setting up array
$tsData=array(
'domain'=>$_POST['domain'].$_POST['extension']
);
// alert Client Class
$client=Client::create();
// alert availability function
$request=$client->availability(['domain'=>$tsData['domain']]);
// sending request
$response=$request->send();
// getting response
if((int)$response->isSuccessful()==0&&strlen($response->getMessage())>1)
$result="0";
elseif((int)$response->isSuccessful()==1&&(int)$response->getMessage()==1)
$result="1";
elseif((int)$response->isSuccessful()==0&&(int)$response->getMessage()==0)
$result="2";
// After getting results return them
if($result==0){
$_SESSION['msg']="<div class='alert alert-danger' role='alert'>".$response->getMessage()."</div>";
header("location: ../domainchecker.php");
}
if($result==1){
$_SESSION['msg']="<div class='alert alert-success' role='alert'>Congratulations domain has been selected successfully.</div>";
$_SESSION['domain']=$tsData['domain'];
header("location: ../createaccount.php");
}
if($result==2){
$_SESSION['msg']="<div class='alert alert-danger' role='alert'>Sorry domain already registered.</div>";
header("location: ../domainchecker.php");
}
// end statment
}