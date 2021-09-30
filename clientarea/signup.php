<?php
include "includes/connect.php";
if($_COOKIE['client']=='NULL'||!isset($_COOKIE['client'])){
?>
<html>
<head>
<title>Client Signup - <?php echo SITE_NAME?></title>
<link rel="stylesheet" href="../template/css/bootstrap.min.css">
<meta name="viewport" content="width=device-width">
</head>
<body>
<div class="container">
<div class="row">
<div class="col-lg-4 offset-lg-4 col-md-6 offset-md-3 col-sm-12"><br>
<div class=" card py-3 md-5 shadow rounded">
<div class="card-body">
<form action="function/signup.php" method="post">
<h3 class="text-center"><b>Client Signup</b></h3><hr>
<div class="mb-3">
<label class="form-label">Your Name</label>
<input class="form-control" type="text" name="name" placeholder="Enter Your Name">
</div>
<div class="mb-3">
<label class="form-label">Email Address</label>
<input class="form-control" type="email" name="email" placeholder="Enter Email Address">
</div>
<div class="mb-3">
<label class="form-label">Password</label>
<input class="form-control" type="password" name="password" placeholder="Enter Password">
</div>
<div class="mb-3">
<label class="form-label">Confirm Password</label>
<input class="form-control" type="password" name="cpassword" placeholder="Enter Password Again">
</div>
<div class="mb-3">
<input type="checkbox" class="form-check-input" name="check" value="1" required> <label class="form-check-label">I Agree with Term of Service</label>
</div>
<div class="d-grid">
<input class="btn btn-outline-success" type="submit" name="signup" value="SIGNUP"> <br>
<a href="login.php" style="text-decoration:none;" class="text-success">Existing Account</a>
<a href="forget.php" class="text-success" style="text-decoration:none;">Forget Password</a>
</div>
</form>
</div>
</div><br><br>
</div>
</div>
</body>
</html>
<?php
}
else{
header("location: ./home.php");
}
?>
