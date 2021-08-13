<?php
include "includes/connect.php";
if($_GET['reset']=='true'){
if($_GET['key']==md5($_GET['uid'])){
?>
<html>
<head>
<title>Reset Password - <?php echo SITE_NAME?></title>
<link rel="stylesheet" href="../template/css/bootstrap.min.css">
<meta name="viewport" content="width=device-width">
</head>
<body>
<div class="container">
<div class="row">
<div class="col-lg-4 offset-lg-4 col-md-6 offset-md-3 col-sm-12"><br>
<?php
if(isset($_SESSION['msg'])){
echo $_SESSION['msg'];
unset($_SESSION['msg']);
}
?>
<div class=" card py-3 md-5 shadow rounded ">
<div class="card-body">
<h3 class="text-center"><b>Reset Password</b></h3><hr>
<form action="function/reset.php" method="post" onsubmit="var np=document.getElementById('np').value;var cp=document.getElementById('cp').value;if(np!=cp){alert('Password not maych'); return false;} return true;">
<div class="mb-3">
<label class="form-label text-muted">New Password</label>
<input type="password" name="newpassword" id="np" class="form-control" placeholder="Enter New Password">
</div> 
<input type="hidden" name="uid" value="<?php echo $_GET['uid'];?>">
<div class="mb-3">
<label class="form-label text-muted">Confirm Password</label>
<input type="password" id="cp" name="confirmpassword" class="form-control" placeholder="Confirm Password">
</div> 
<div class="d-grid">
<input type="submit" name="reset" value="Change Password" class="btn btn-outline-success">
</div>
</form>
</div>
</div><br><br>
</div>
</div>
<?php
}
}
?>