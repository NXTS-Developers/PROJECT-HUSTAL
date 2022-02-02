<?php

include "connect.php";
if(isset($_POST['forget'])){
$uid=$_POST['email'];
$key=md5($uid);
include "../mail/forget.php";
header("location: ../login.php");
}
?>
