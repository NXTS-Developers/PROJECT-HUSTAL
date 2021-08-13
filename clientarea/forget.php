<?php
ob_start();
session_start();
include "../includes/config.php";
require_once "../vendor/user_info/UserInfo.php";
?>
<html>
<head>
<title>Forget Password - <?php echo SITE_NAME?></title>
<link rel="stylesheet" href="../template/css/bootstrap.min.css">
<meta name="viewport" content="width=device-width">
</head>
<body>
<div class="container">
<div class="row">
<div class="col-lg-4 offset-lg-4 col-md-6 offset-md-3 col-sm-12"><br>
<div class=" card py-3 md-5 shadow rounded ">
<div class="card-body">
<h3 class="text-center"><b>Forget Password</b></h3><hr>
<?php
if(isset($_SESSION['msg'])){
echo $_SESSION['msg'];
unset($_SESSION['msg']);
}
?>
<form action="function/forget.php" method="post">
<div class="mb-3">
<label class="form-label text-muted">Email Address</label>
<input type="email" name="email" class="form-control" placeholder="Enter Account Email Address">
</div> 
<div class="d-grid">
<input type="submit" name="forget" value="Reset Password" class="btn btn-outline-success">
</div><br>
<a href="login.php" style="text-decoration:none;" class="text-success">Existing Account</a><br>
<a href="signup.php" class="text-success" style="text-decoration:none;">Create Account</a>
</form>
</div>
</div><br><br>
</div>
</div>
</div>