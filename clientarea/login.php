<?php
ob_start();
session_start();
include "../includes/config.php";
require_once "../vendor/user_info/UserInfo.php";
if($_COOKIE['client']=='NULL'||!isset($_COOKIE['client'])){
?>
<html>
<head>
<title>Login - <?php echo SITE_NAME ?></title>
<link rel="stylesheet" href="../template/css/bootstrap.min.css">
<link rel="stylesheet" href="../template/css/login.css">
<meta name="viewport" content="width=device-width">
</head>
<body>
<div class="container">
<div class="row">
<div class="col-lg-4 offset-lg-4 col-md-6 offset-md-3 col-sm-12"><br>
<div class="card py-3 md-5 shadow rounded" >
<div class="card-body">
<h3 class=" text-center"><b>Client Login</b></h3><hr>
<?php
if(isset($_SESSION['msg'])){
echo $_SESSION['msg'];
unset($_SESSION['msg']);
}
?>
<form action="function/login.php" method="post">
<div class="mb-3">
<label class="form-label text-muted">Email Address</label>
<input class="form-control" type="email" name="email" placeholder="Enter Email Address">
</div>
<div class="mb-3">
<label class="form-label text-muted">Password</label>
<input class="form-control" type="password" name="password" placeholder="Enter Password">
</div>
<div class="mb-3">
<input type="checkbox" class="form-check-input" name="check" value="1"> <label class="form-check-label">Remember me</label>
</div>
<div class="d-grid">
<input class="btn btn-success" type="submit" name="login" value="LOGIN">
</div><br>
<a href="signup.php" style="text-decoration:none;" class="text-success">Create Account</a><br>
<a href="forget.php" class="text-success" style="text-decoration:none;">Forget Password</a>
</form></div>
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
