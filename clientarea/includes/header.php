<?php
include __DIR__."/connect.php";
if(!isset($_COOKIE['client'])){
$_SESSION['msg']='<div class="alert alert-danger" role="alert">Login to continue</div>';
header("location: ./login.php");
}
$user=mysqli_fetch_assoc(mysqli_query($connect,"select * from vhost_client where client_email='".$_COOKIE['client']."'"));
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
<!--meta information-->
<title><?php echo $title." - ".SITE_NAME;?></title>
<meta chrset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<meta name="description" content="<?php echo $desc;?>">
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
<body class="bg-white">
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
<div class="container-fluid">
<a class="navbar-brand" href="index.php"><?php echo SITE_NAME;?></a>
<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
<span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse" id="navbarSupportedContent">
<ul class="navbar-nav me-auto mb-2 mb-lg-0">
<li class="nav-item"> <a class="nav-link" aria-current="page" href="home.php">Home</a></li>
</li>
<li class="nav-item dropdown"> <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Accounts</a>
<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
<li><a class="dropdown-item" href="accounts.php">View Accounts</a></li>
<li><a class="dropdown-item" href="domainchecker.php">Add Account</a></li>
</ul>
</li>
<li class="nav-item dropdown"> <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Tickets</a>
<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
<li><a class="dropdown-item" href="tickets.php">View Tickets</a></li>
<li><a class="dropdown-item" href="createticket.php">Add Ticket</a></li>
</ul>
</li>
</li>
<li class="nav-item dropdown"> <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"> Hi <?php echo $user['client_name'];?> </a>
<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
<li><a class="dropdown-item" href="accountsettings.php">Settings</a></li>
<li><a class="dropdown-item" href="function/logout.php">Logout</a></li>
</ul>
</li>
</li>
</ul>
</div>
</div>
</nav><br>
<!-- Main Content -->
<?php
if($user['client_status']==0){
echo '<div class="container"><div class="alert alert-danger" role="alert"><span class="pull-left"><small>Please confirm your account</small></span> <a style="text-decoration:none" class="btn btn-warning btn-sm pull-right" href="resend.php?uid='.$_COOKIE['client'].'"><small>Resend Email</small></a><div class="clearfix"></div></div></div>';
}
?>