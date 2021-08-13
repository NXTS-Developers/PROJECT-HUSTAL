<?php
include __DIR__."/connect.php";
if(!isset($_SESSION['admin'])){
$_SESSION['msg']='<div class="alert alert-danger" role="alert">Login to continue</div>';
header("location: ./login.php");
}
$user=mysqli_fetch_assoc(mysqli_query($connect,"select * from vhost_admin where admin_email='".$_SESSION['admin']."'"));
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
<!--meta information-->
<title><?php echo $title." - ".SITE_NAME;?></title>
<meta chrset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<meta name="description" content="<?php echo $desc;?>">
<!--styles and scripts-->
<link rel="icon" href="../template/image/icon.png" type="image/png" sizes="16x16">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" />
<link rel="stylesheet" href="../template/css/bootstrap.min.css">
<script src="../template/js/jquery.js"></script>
<script src="../template/js/popper.min.js"></script>
<script src="../template/js/bootstrap.min.js"></script>
</head>
<body class="bg-light">
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
<div class="container-fluid">
<a class="navbar-brand" href="index.php"><?php echo SITE_NAME;?></a>
<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
<span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse" id="navbarSupportedContent">
<ul class="navbar-nav me-auto mb-2 mb-lg-0">
<li class="nav-item"> <a class="nav-link" aria-current="page" href="home.php">Home</a></li>
</li>
<li class="nav-item"> <a class="nav-link" aria-current="page" href="accounts.php">Accounts</a></li>
<li class="nav-item"> <a class="nav-link" aria-current="page" href="tickets.php">Tickets</a></li>
<li class="nav-item dropdown"> <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"> Hi <?php echo $user['admin_name'];?> </a>
<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
<li><a class="dropdown-item" href="accountsettings.php">Settings</a></li>
<li><a class="dropdown-item" href="function/logout.php">Logout</a></li>
</ul>
</li>
</li>
</ul>
</div>
</div>
</nav>
<!-- Main Content -->