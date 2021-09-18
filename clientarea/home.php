<?php
$title="Home";
$desc="";
include "includes/header.php";
?>
<div class="container">
<div class="row">
<div class="col-md-6"><br>
<div class="card mb shadow-sm rounded"><br>
<a href="accounts.php" style="text-decoration:none;" class="text-dark"><div class="card-body text-center">
<i class="fa fa-server fa-5x"></i><br><br>
<h5 class="text-muted">Hosting Accounts(<?php echo mysqli_num_rows(mysqli_query($connect,"select * from vhost_cpanel where client_id='".$user['client_id']."'"));?>)</h5>
</div>
</a>
</div>
</div>
<div class="col-md-6"><br>
<div class="card shadow-sm rounded"><br>
<a href="ssls.php" style="text-decoration:none;" class="text-dark"><div class="card-body text-center">
<i class="fa fa-lock fa-5x"></i><br><br>
<h5 class="text-muted">SSL Certificates(<?php echo mysqli_num_rows(mysqli_query($connect,"select * from vhost_ssl where client_id='".$user['client_id']."'"));?>)</h5>
</div>
</a>
</div>
</div>
<div class="col-md-6"><br>
<div class="card shadow-sm rounded"><br>
<a href="tickets.php" style="text-decoration:none;" class="text-dark"><div class="card-body text-center">
<i class="fa fa-support fa-5x"></i><br><br>
<h5 class="text-muted">Support Tickets(<?php echo mysqli_num_rows(mysqli_query($connect,"select * from vhost_ticket where client_id='".$user['client_id']."'"));?>)</h5>
</div>
</a>
</div>
</div>
<div class="col-md-6"><br>
<div class="card shadow-sm rounded">
<div class="card-body">
<span><b>Device Information</b></span><hr>
<?php
require_once "../vendor/user_info/UserInfo.php";
echo "<b>Client IP: </b>".UserInfo::get_ip();
echo "<br><b>Client OS: </b>".UserInfo::get_device();
echo "<br><b>Client Browser: </b>".UserInfo::get_browser();
echo "<br><b>Service Domain: </b>".SITE_ADDR;
?>
</div>
</div>
</div>
</div><br>
</div>
</div>
