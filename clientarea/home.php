<?php
$title="Home";
$desc="";
include "includes/header.php";
?>
<div class="container">
<div class="row">
<div class="col-lg-6 col-md-6">
<div class="card mb shadow-sm rounded"><br>
<a href="accounts.php" style="text-decoration:none;" class="text-dark"><div class="card-body text-center">
<i class="fa fa-server fa-5x"></i><br><br>
<h5 class="text-muted">Hosting Accounts(<?php echo mysqli_num_rows(mysqli_query($connect,"select * from vhost_cpanel where client_id='".$user['client_id']."'"));?>)</h5>
</div>
</a>
</div>
</div>
<div class="col-lg-6 col-md-6"><br>
<div class="card shadow-sm rounded"><br>
<a href="tickets.php" style="text-decoration:none;" class="text-dark"><div class="card-body text-center">
<i class="fa fa-support fa-5x"></i><br><br>
<h5 class="text-muted">Support Tickets(<?php echo mysqli_num_rows(mysqli_query($connect,"select * from vhost_ticket where client_id='".$user['client_id']."'"));?>)</h5>
</div>
</a>
</div>
</div>
<div class="col-lg-6 col-md-6"><br>
<div class="card shadow-sm rounded"><br>
<a href="tickets.php" style="text-decoration:none;" class="text-dark"><div class="card-body text-center">
<i class="fa fa-support fa-5x"></i><br><br>
<h5 class="text-muted">Support Tickets(<?php echo mysqli_num_rows(mysqli_query($connect,"select * from vhost_ssl where client_id='".$user['client_id']."'"));?>)</h5>
</div>
</a>
</div>
</div>
<div class="col-lg-6 col-md-6"><br>
<div class="card shadow-sm rounded">
<div class="card-body">
<span><b>Client Information</b></span><hr>
<?php
require_once "../vendor/user_info/UserInfo.php";
echo "<b>Client Name: </b>".$user['client_name'];
echo "<br><b>Client Email: </b>".$user['client_email'];
echo "<br><b>Client IP: </b>".UserInfo::get_ip();
echo "<br><b>Client OS: </b>".UserInfo::get_device();
echo "<br><b>Client Browser: </b>".UserInfo::get_browser();
echo "<br><b>Service Domain: </b>".SITE_ADDR;
?>
</div>
</div>
</div><br>
</div>
</div>
</div>
