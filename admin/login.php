<?php
ob_start();
session_start();
include "../includes/config.php";
require_once "../vendor/user_info/UserInfo.php";
if(!isset($_SESSION['admin'])){
?>
<html>
<head>
<title>ADMLogin - <?php echo SITE_NAME ?></title>
<link rel="stylesheet" href="../template/css/bootstrap.min.css">
<meta name="viewport" content="width=device-width">
</head>
<body>
<div class="container">
<div class="row">
<div class="col-lg-4 offset-lg-4 col-md-6 offset-md-3 col-sm-12" style="margin-top:20%;" ><br>
<?php
if(isset($_SESSION['msg'])){
echo $_SESSION['msg'];
unset($_SESSION['msg']);
}
?>
<div class="card" >
<div class="card-header text-center">Admin Login</div>
<div class="card-body">
<form action="function/login.php" method="post">
<div class="mb-3">
<label class="form-label text-muted">Email Address</label>
<input class="form-control" type="email" name="email" placeholder="Enter Email Address">
</div>
<div class="mb-3">
<label class="form-label text-muted">Password</label>
<input class="form-control" type="password" name="password" placeholder="Enter Password">
</div>
<div class="d-grid">
<input class="btn btn-success" type="submit" name="login" value="LOGIN">
</form>
</div></div>
<div class="card-footer text-center text-muted">Your Current IP: <?php echo UserInfo::get_ip();?></div>
</div>
</div>
</div><br>
</div>
</body>
</html>
<?php
}
else{
header("location: ./home.php");
}
?>