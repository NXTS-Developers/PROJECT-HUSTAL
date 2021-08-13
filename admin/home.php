<?php
$title="Home";
$desc="";
include "includes/header.php";
?>
<div class="container">
<div class="row">
<div class="col-lg-6 col-md-6"><br>
<div class="card"><br>
<div class="card-body text-center">
<i class="fa fa-server fa-5x"></i><br><br>
<h5 class="text-muted">
Client Accounts(<?php echo mysqli_num_rows(mysqli_query($connect,"select * from vhost_client"));?>)</h5>
</div>
</div>
</div>
<div class="col-lg-6 col-md-6"><br>
<div class="card"><br>
<div class="card-body text-center">
<i class="fa fa-support fa-5x"></i><br><br>
<h5 class="text-muted">Support Tickets(<?php echo mysqli_num_rows(mysqli_query($connect,"select * from vhost_ticket"));?>)</h5>
</div>
</div>
</div>
<div class="col-lg-6 col-md-6"><br>
<div class="card">
<div class="card-header">
Client Information
</div>
<div class="card-body">
<?php
require_once "../vendor/user_info/UserInfo.php";
echo "<b>Admin Name: </b>".$user['admin_name'];
echo "<br><b>Admin Email: </b>".$user['admin_email'];
echo "<br><b>Admin IP: </b>".UserInfo::get_ip();
echo "<br><b>
Admin OS: </b>".UserInfo::get_device();
echo "<br><b>Admin Browser: </b>".UserInfo::get_browser();
echo "<br><b>Service Domain: </b>".SITE_ADDR;
?>
</div>
</div>
</div>
<div class="col-lg-6 col-md-6"><br>
<div class="card">
<div class="card-header">
System Update
</div>
<div class="card-body">
<h5 class="text-muted">All of the data will be backed up before system up date and service will be closed for 6 hours.</h5>
<h4 class="text-center"><b>Estimated Time</b></h4>
<div id="clockdiv"> 
<h6 class="text-center"><span class="days" id="day"></span>D : <span class="days" id="hour"></span>H : <span class="days" id="minute"></span>M : <span class="days" id="second"></span> S</h6>
</div>
</div><br>
</div><br>
<script>
var deadline = new Date("apr 15, 2021 12:00:00").getTime(); 
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