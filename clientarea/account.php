<?php
$title=$_GET['aid'];
$desc="";
include "includes/header.php";
$sl=mysqli_query($connect,"select * from vhost_cpanel where cpanel_username='".$_GET['aid']."' and client_id='".$user['client_id']."'");
if(!mysqli_num_rows($sl)>0){
header('location: accounts.php');
}
$sql=mysqli_fetch_assoc($sl);
$pwd='{"t":"ftp","c":{"v":1,"p":"'.$sql['cpanel_password'].'"}}';
$hash=base64_encode($pwd);
?>
<div class="container"><br>
<div class="row">
<div class="col-lg-12 col-md-12">
<div class="list-group shadow-sm rounded">
<div class="list-group-item">
<?php echo "<h5 class='text-dark'>".$_GET['aid']."(".$sql['cpanel_label'].")</h5>";?>
</div>
<div class="list-group-item">
<div class="row"><?php if($sql['cpanel_status']==1){?>
<div class="col-lg-4 col-md-4 d-grid">
<a href="cpanel.php?aid=<?php echo $_GET['aid'];?>" target="_blank" class="btn btn-success">Control Panel</a>
</div>
<div class="col-lg-4 col-md-4 d-grid">
<a href="https://filemanager.ai/new/#/c/ftpupload.net/<?php echo $sql['cpanel_username']."/".$hash?>" target="_blank" class="btn btn-primary">File Manager</a>
</div>
<?php } else{ ?>
<div class="col-lg-8 col-md-8">
<p class="text-muted">All of your account domain data files folders including database files will be permanently deleted after <span id="dead"></span> days of deactivation</p>
</div>
<?php } ?>
<div class="col-lg-4 col-md-4">
<div class="d-grid">
<a href="cpanelsettings.php?aid=<?php echo $_GET['aid'];?>" class="btn btn-warning">Edit Settings</a>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="col-lg-6 col-md-6"><br>
<div class="list-group shadow-sm rounded">
<div class="list-group-item fs-5 text-dark">
Account Details
</div>
<div>
<div class="list-group-item">
<div><div class="text-muted d-flex justify-content-between align-items-center"><b>Username</b><?php echo $sql['cpanel_username'];?></div></div>
</div>
<div class="list-group-item">
<div><div class="text-muted d-flex justify-content-between align-items-center"><b>Password</b><?php echo $sql['cpanel_password'];?> </div></div>
</div>
<div class="list-group-item">
<div><div class="text-muted d-flex justify-content-between align-items-center"><b>Status</b><?php if($sql['cpanel_status']==1){echo "<span class='badge bg-success'>Active</span>";}else{ if($sql['cpanel_status']==2){echo "<span class='badge bg-warning'>Inactive</span>";}else{echo "<span class='badge bg-danger'>Suspended</span>";} }?></div></div>
</div>
<div class="list-group-item">
<div><div class="text-muted d-flex justify-content-between align-items-center"><b> Label  </b><?php echo $sql['cpanel_label'];?> </div></div>
</div>
<div class="list-group-item">
<div><div class="text-muted d-flex justify-content-between align-items-center"><b>Main Domain</b><span><?php echo $sql['cpanel_client_username'].".".SITE_ADDR;?></span></div></div>
</div>
<div class="list-group-item">
<div><div class="text-muted d-flex justify-content-between align-items-center"><b>IP Address</b><?php require_once "../vendor/user_info/UserInfo.php";echo UserInfo::get_ip();?></div></div>
</div>
<div class="list-group-item">
<div><div class="text-muted d-flex justify-content-between align-items-center"><b>Server IP</b>185.27.134.46 </div></div>
</div>
<div class="list-group-item">
<div><div class="text-muted"><b>Date Created</b><?php echo $sql['cpanel_date'];?> </div></div>
</div>
</div>
</div>
</div>
<div class="col-lg-6 col-md-6"><br>
<div class="list-group shadow-sm rounded">
<div class="list-group-item fs-5 text-dark">
MySQL Details
</div>
<div>
<div class="list-group-item">
<div><div class="text-muted d-flex justify-content-between align-items-center"><b>MySQL Username</b><?php echo $sql['cpanel_username'];?> </div></div>
</div>
<div class="list-group-item">
<div><div class="text-muted d-flex justify-content-between align-items-center"><b>MySQL Password</b><?php echo $sql['cpanel_password'];?> </div></div>
</div>
<div class="list-group-item">
<div><div class="text-muted d-flex justify-content-between align-items-center"><b>MySQL Hostname</b>sqlxxx.byethost.org</div></div>
</div>
<div class="list-group-item">
<div><div class="text-muted d-flex justify-content-between align-items-center"><b>MySQL Port</b>3306</div></div>
</div>
</div>
</div><br>
<div class="list-group shadow-sm rounded">
<div class="list-group-item fs-5 text-dark">
FTP Details
</div>
<div>
<div class="list-group-item">
<div><div class="text-muted d-flex justify-content-between align-items-center"><b>FTP Username</b><?php echo $sql['cpanel_username'];?> </div></div>
</div>
<div class="list-group-item">
<div><div class="text-muted d-flex justify-content-between align-items-center"><b>FTP Password</b><?php echo $sql['cpanel_password'];?> </div></div>
</div>
<div class="list-group-item">
<div><div class="text-muted d-flex justify-content-between align-items-center"><b>FTP Hostname</b>ftpupload.net</div></div>
</div>
<div class="list-group-item">
<div><div class="text-muted d-flex justify-content-between align-items-center"><b>FTP Port</b>21</div></div>
</div>
</div>
</div><br>
</div><br> 
</div>
