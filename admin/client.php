<?php
$title="Client #".$_GET['cid'];
$desc="";
include "includes/header.php";
if(isset($_GET['cid'])){
$usr=mysqli_fetch_assoc(mysqli_query($connect,"select * from vhost_client where client_id='".$_GET['cid']."'"));
if($usr['client_status']==1){
$sts=" <span class='badge bg-success'> Verified </span>";
}
else{
$sts="<span class='badge bg-danger'> Unverified </span>";
}
$sql=mysqli_query($connect,"select * from vhost_cpanel where client_id='".$_GET['cid']."'");
?>
<div class="container"><br>
<div class="card">
<div class="card-body">
<h5><b>Client #<?php echo $_GET['cid'];?></b></h5>
<p class="text-muted">
<b>Name:</b> <?php echo $usr['client_name']?><br>
<b>Email Address: </b><?php echo $usr['client_email']?><br>
<b>Status: </b><?php echo $sts?><br>
<b>Accounts:</b> <?php echo mysqli_num_rows($sql)?><br>
</p>
<br><br>
<h5 class="text-muted"><b>cPanel Accounts</b></h5><hr><?php if(isset($_SESSION['msg'])){echo $_SESSION['msg'];unset($_SESSION['msg']);}?>
<div class="table-responsive-sm">
<table class="table table-striped">
<thead>
<tr>
<th>Username</th>
<th>Status</th>
<th>Action</th>
</tr>
</thead>
<tbody>
<?php
$sql1=mysqli_query($connect,"select * from vhost_cpanel where client_id='".$usr['client_id']."' order by cpanel_id desc");
if(mysqli_num_rows($sql1)>0){
while($app=mysqli_fetch_assoc($sql1)){
$id=$app['cpanel_username'];
$label=$app['cpanel_label'];
if($app['cpanel_status']==1){
$status=" <span class='badge bg-success'> Active </span>";
}
else{
if($app['cpanel_status']==2){
$status="<span class='badge bg-warning'> Inactive </span>";
}
else{
$status="<span class='badge bg-danger'> Suspended </span>";
}
}
echo "<tr>
<td>$id</td>
<td>$status</td>
<td><a href='account.php?aid=$id' class='btn btn-success btn-sm'>Manage</a></td>
</tr>";
}
}
else{
echo '<tr><td colspan="4" class="text-center">No Account Yet</td></tr>';
}
?>
</tbody>
</table>
</div>
<p><small><?php echo mysqli_num_rows($sql);?>/3 Free Accounts</small></p>
</div>
</div>
</div>
</div>
<?php
}
?>