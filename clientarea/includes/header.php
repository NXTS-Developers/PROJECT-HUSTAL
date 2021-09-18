<?php
include __DIR__."/connect.php";
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
<nav class="navbar navbar-expand-lg navbar-white bg-white">
<div class="container-fluid">
<a class="navbar-brand text-dark" href="index.php"><?php echo SITE_NAME;?></a>
<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
<span class="fa fa-bars text-dark"></span>
</button>
<div class="collapse navbar-collapse" id="navbarSupportedContent">
<ul class="navbar-nav ms-auto mb-2 mb-lg-0">
<li class="nav-item"> <a class="nav-link text-dark" aria-current="page" href="home.php">Home</a></li>
</li>
<li class="nav-item dropdown"> <a class="nav-link text-dark dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Accounts</a>
<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
<li><a class="dropdown-item text-dark" href="accounts.php">View Accounts</a></li>
<li><a class="dropdown-item text-dark" href="domainchecker.php">Add Account</a></li>
</ul>
</li>
<li class="nav-item dropdown"> <a class="nav-link text-dark dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Get SSL</a>
<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
<li><a class="dropdown-item text-dark" href="ssls.php">View SSL</a></li>
<li><a class="dropdown-item text-dark" href="newssl.php">Add SSL</a></li>
</ul>
</li>
<li class="nav-item dropdown"> <a class="nav-link text-dark dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Tickets</a>
<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
<li><a class="dropdown-item text-dark" href="tickets.php">View Tickets</a></li>
<li><a class="dropdown-item text-dark" href="createticket.php">Add Ticket</a></li>
</ul>
</li>
</li>
<li class="nav-item dropdown"> <a class="nav-link text-dark dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"> Hi <?php echo $user['client_name'];?> </a>
<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
<li><a class="dropdown-item text-dark" href="accountsettings.php">Settings</a></li>
<li><a class="dropdown-item text-dark" href="function/logout.php">Logout</a></li>
</ul>
</li>
</li>
</ul>
</div>
</div>
</nav>
<!-- Main Content -->
<?php
if($user['client_status']==0){
header('location: ./validate.php');
}
?>
