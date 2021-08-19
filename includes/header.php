<?php
include __DIR__."/config.php";
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
<!--meta information-->
<title><?php echo $title." - ".SITE_NAME;?></title>
<meta chrset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<meta name="description" content="<?php echo $desc;?>">
<meta name="og:description" content="<?php echo $desc;?>">
<meta name="keywords" content="<?php $n=SITE_NAME;echo "$n , freehosting , freessl , unlimitedhosting , unlimitedsql , cpanelhosting , freedomain , vistapanel , premiumhosting , unlimitedhits , $n , $n free , unlimitedwebsite , freeforlife , registernow";?>">
<meta name="og:type" content="website">
<meta name="og:url" content="<?php echo $_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];?>">
<meta name="og:image" content="https://<?php echo $_SERVER['HTTP_HOST'];?>/template/image/icon.png">
<!--styles and scripts-->
<link rel="icon" href="https://<?php echo $_SERVER['HTTP_HOST'];?>/template/image/icon.png" type="image/png" sizes="16x16">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" />
<link rel="stylesheet" href="template/css/bootstrap.min.css">
<script src="template/js/jquery.js"></script>
<script src="template/js/popper.min.js"></script>
<script src="template/js/bootstrap.min.js"></script>
</head>
<body>
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
<div class="container-fluid">
<a class="navbar-brand" href="index.php"><?php echo SITE_NAME;?></a>
<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
<span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse" id="navbarSupportedContent">
<ul class="navbar-nav me-auto mb-2 mb-lg-0">
<li class="nav-item"> <a class="nav-link active" aria-current="page" href="index.php">Free Hosting</a></li>
</li>
<li class="nav-item"> <a class="nav-link active" aria-current="page" href="premium-hosting.php">Premium Hosting</a></li>
</li>
<li class="nav-item"> <a class="nav-link active" aria-current="page" href="domain.php">Register Domain</a></li>
</li>
<li class="nav-item"> <a class="nav-link active" aria-current="page" href="privacy.php">Privacy Policy</a></li>
<li class="nav-item dropdown"> <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"> Clientarea </a>
<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
<li><a class="dropdown-item" href="clientarea/login.php">Login</a></li>
<li><a class="dropdown-item" href="clientarea/signup.php">Register</a></li>
</ul>
</li>
<li class="nav-item"> <a class="nav-link active" aria-current="page" href="contact.php">Contact us</a></li>
</li>
</ul>
</div>
</div>
</nav>
<!-- Main Content -->
