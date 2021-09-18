<?php
include 'includes/connect.php';
if(!isset($_COOKIE['client'])||$_COOKIE['client']=='NULL'){
$_SESSION['msg']='<div class="alert alert-danger" role="alert">Login to continue</div>';
header("location: ./login.php");
}
else{
$sql=mysqli_query($connect,"select * from vhost_client where client_email='".$_COOKIE['client']."'");
if(mysqli_num_rows($sql)>0){
$user=mysqli_fetch_assoc($sql);
}
else{
header('location: login.php');
}
}
if($user['client_status']!=0){
header('location: index.php');
}
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
<!--meta information-->
<title><?php echo "Validate - ".SITE_NAME;?></title>
<meta chrset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<meta name="description" content="<?php echo 'Validation page for '.SITE_NAME;?>">
<meta name="og:description" content="">
<meta name="og:type" content="website">
<meta name="og:url" content="<?php echo $_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];?>">
<meta name="og:image" content="https://<?php echo $_SERVER['HTTP_HOST'];?>/template/image/icon.png">
<!--styles and scripts-->
<link rel='icon' href='../template/image/icon.png' type="image/png" sizes="16x16">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" />
<link rel="stylesheet" href="../template/css/bootstrap.min.css">
<script src="../template/js/jquery.js"></script>
<script src="../template/js/popper.min.js"></script>
<script src="../template/js/bootstrap.min.js"></script>
</head>
<body class="bg-white container">
<div class="row">
<div class="offset-md-3 col-md-6 my-5">
<div class="mx-3 my-5 card card-body text-center">
<h3>Validation Error</h3>
<p>You need to validate your account before you can use our free hosting service please click on the link that had been sent your registered email address.</p>
<div><a href='resend.php?uid=<?php echo $user['client_email']?>' class='btn btn-primary mx-1'>Resend Email</a><a href='function/logout.php' class='btn btn-danger'>Logout</a></div>
</div>
</div>
</div>
</body>
</html>
