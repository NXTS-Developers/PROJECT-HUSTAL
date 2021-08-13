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
</div>
<div class="col-lg-6 col-md-6"><br>
<div class="card shadow-sm rounded">
<div class="card-body">
<span><b>Service Update</b></span><hr>
<h5 class="text-muted">All of the data will be backed up before system up date and service will be closed for 6 hours.</h5>
<h4 class="text-center"><b>Estimated Time</b></h4>
<div id="clockdiv"> 
<h6 class="text-center"><span class="days" id="day"></span>D : <span class="days" id="hour"></span>H : <span class="days" id="minute"></span>M : <span class="days" id="second"></span> S</h6>
</div>
</div><br>
</div><br>
<script>
var deadline = new Date("4 26, 2021 12:00:00").getTime(); 
var x = setInterval(function() { 
var now = new Date().getTime(); 
var t = deadline - now; 
var days = Math.floor(t / (1000 * 60 * 60 * 24)); 
var hours = Math.floor((t%(1000 * 60 * 60 * 24))/(1000 * 60 * 60)); 
var minutes = Math.floor((t % (1000 * 60 * 60)) / (1000 * 60)); 
var seconds = Math.floor((t % (1000 * 60)) / 1000); 
document.getElementById("day").innerHTML =days ; 
document.getElementById("hour").innerHTML =hours; 
document.getElementById("minute").innerHTML = minutes;  
document.getElementById("second").innerHTML =seconds;  
if (t < 0) { 
        clearInterval(x); 
        document.getElementById("demo").innerHTML = "TIME UP"; 
        document.getElementById("day").innerHTML ='0'; 
        document.getElementById("hour").innerHTML ='0'; 
        document.getElementById("minute").innerHTML ='0' ;  
        document.getElementById("second").innerHTML = '0'; } 
}, 1000);
</script>
</div>
</div>
</div>