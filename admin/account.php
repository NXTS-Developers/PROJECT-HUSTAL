<?php
$title=$_GET['aid'];
$desc="";
include "includes/header.php";
$sql=mysqli_fetch_assoc(mysqli_query($connect,"select * from vhost_cpanel where cpanel_username='".$_GET['aid']."'"));
$pwd='{"t":"ftp","c":{"v":1,"p":"'.$sql['cpanel_password'].'"}}';
$hash=base64_encode($pwd);
$usr=mysqli_fetch_assoc(mysqli_query($connect,"select client_email from vhost_client where client_id='".$sql['client_id']."'"));
?>
<div class="container"><br>
<div class="row">
<div class="col-lg-12 col-md-12">
<div class="list-group">
<div class="list-group-item">
<?php echo "<h5 class='text-muted'>".$_GET['aid']."(".$sql['cpanel_label'].")</h5>";?>
</div>
<div class="list-group-item">
<div class="row"><?php if($sql['cpanel_status']==1){?>
<div class="col-lg-4 col-md-4 d-grid">
<a href="cpanel.php?aid=<?php echo $_GET['aid'];?>" target="_blank" class="btn btn-success">Control Panel</a>
</div>
<div class="col-lg-4 col-md-4 d-grid">
<a href="https://filemanager.ai/new/#/c/ftpupload.net/<?php echo $sql['cpanel_username']."/".$hash?>" target="_blank" class="btn btn-primary">File Manager</a>
</div>
<div class="col-lg-4 col-md-4">
<div class="d-grid">
<a href="cpanelsettings.php?aid=<?php echo $_GET['aid'];?>" class="btn btn-warning">Edit Settings</a>
</div>
<?php } else{ ?>
<div class="col-lg-8 col-md-8">
<p class="text-muted">You can reactivate account inorder to retrive all data in account and put them off</p>
</div>
<div class="col-lg-4 col-md-4">
<form action="function/unsuspendcpanel.php" method="post">
<div class="d-grid">
<input type="hidden" name="aid" value="<?php echo $_GET['aid'];?>">
<input type="hidden" name="email" value="<?php echo $usr['client_email'];?>">
<input type="hidden" name="username" value="<?php echo $sql['cpanel_client_username'];?>">
<button name="reactivate" class="btn btn-warning">Reactivate Account</button>
</div>
</form>
<?php } ?>
</div>
</div>
</div>
</div>
</div>
<div class="col-lg-6 col-md-6"><br>
<div class="list-group">
<div class="list-group-item fs-5 text-dark">
Account Details
</div>
<table>
<tr class="list-group-item">
<td><small class="text-muted"><b>Username</b></small></td>
<td><small class="text-muted px-5"><?php echo $sql['cpanel_username'];?></small></td>
</tr>
<tr class="list-group-item">
<td><small class="text-muted"><b>Password</b></small></td>
<td><small class="text-muted px-5"><?php echo $sql['cpanel_password'];?> </small></td>
</tr>
<tr class="list-group-item">
<td><small class="text-muted"><b>Status</b></small><span class="px-4"></span></td>
<td><small class="text-muted px-4"><?php if($sql['cpanel_status']==1){echo "<span class='badge bg-success'>Active</span>";}else{ if($sql['cpanel_status']==2){echo "<span class='badge bg-warning'>Inactive</span>";}else{echo "<span class='badge bg-danger'>Suspended</span>";} }?></small></td>
</tr>
<tr class="list-group-item">
<td><small class="text-muted"><b> Label  </b></small><span class="px-4"><span class="px-1"></span></td>
<td><small class="text-muted px-4"> <?php echo $sql['cpanel_label'];?> </small></td>
</tr>
<tr class="list-group-item">
<td><small class="text-muted"><b>Main Domain</b></small><span class="px-1"></td>
<td><small class="text-muted px-4"><?php echo $sql['cpanel_client_username'].".".SITE_ADDR;?></small></td>
</tr>
<tr class="list-group-item">
<td><small class="text-muted"><b>IP Address</b></small></td>
<td><small class="text-muted px-5"><?php require_once "../vendor/user_info/UserInfo.php";echo UserInfo::get_ip();?></small></td>
</tr>
<tr class="list-group-item">
<td><small class="text-muted"><b>Server IP</b></small><span class="px-1"></span></td>
<td><small class="text-muted px-5">185.27.134.46 </small></td>
</tr>
<tr class="list-group-item">
<td><small class="text-muted"><b>Hosting Volume</b></small></td>
<td><small class="text-muted px-3">(Defined in cPanel)</small></td>
</tr>
<tr class="list-group-item">
<td><small class="text-muted"><b>Date Created</b></small><span class="px-3"></span></td>
<td><small class="text-muted px-2"><?php echo $sql['cpanel_date'];?> </small></td>
</tr>
</table>
</div>
</div>
<div class="col-lg-6 col-md-6"><br>
<div class="list-group">
<div class="list-group-item fs-5 text-dark">
MySQL Details
</div>
<table>
<tr class="list-group-item">
<td><small class="text-muted"><b>MySQL Username</b></small></td>
<td><small class="text-muted px-5"><?php echo $sql['cpanel_username'];?> </small></td>
</tr>
<tr class="list-group-item">
<td><small class="text-muted"><b>MySQL Password</b></small><span class="px-1"></span> </td>
<td><small class="text-muted px-4"><?php echo $sql['cpanel_password'];?> </small></td>
</tr>
<tr class="list-group-item">
<td><small class="text-muted"><b>MySQL Hostname</b></small><span class="px-1"></span></td>
<td><small class="text-muted px-4">(Defined in cPanel)</small></td>
</tr>
<tr class="list-group-item">
<td><small class="text-muted"><b>MySQL Port</b></small><span class="px-2"></span></td>
<td><small class="text-muted px-5">  3306</small></td>
</tr>
</table>
</div><br>
<div class="list-group">
<div class="list-group-item fs-5 text-dark">
FTP Details
</div>
<table>
<tr class="list-group-item">
<td><small class="text-muted"><b>FTP Username</b></small></td>
<td><small class="text-muted px-5"><?php echo $sql['cpanel_username'];?> </small></td>
</tr>
<tr class="list-group-item">
<td><small class="text-muted"><b>FTP Password</b></small></td>
<td><small class="text-muted px-5"><?php echo $sql['cpanel_password'];?> </small></td>
</tr>
<tr class="list-group-item">
<td><small class="text-muted"><b>FTP Hostname</b></small></td>
<td><small class="text-muted px-5">ftpupload.net</small></td>
</tr>
<tr class="list-group-item">
<td><small class="text-muted"><b>FTP Port</b></small><span class="px-4"></span><span class="px-2"></span></td>
<td><small class="text-muted px-4">  21</small></td>
</tr>
</table>
</div><br>
</div><br>
</div>