<?php
$title="Accounts";
$desc="";
include "includes/header.php";
$sql=mysqli_query($connect,"select * from vhost_cpanel where client_id='".$user['client_id']."' order by cpanel_id desc");
?>
<style>
.reg{position:relative; padding:10px 10px 4px 40px; margin:0px 0px 15px 0px; font-size:.85rem; line-height:1.62em;border-radius:2px}
.reg:before{content:'';position:absolute;left:15px;top:15px; width:20px;height:20px;}
.regAlert{background-color:#ffdfdf;color:#48525c}
.regAlert:before{background: url("data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='1 0 22 22' fill='none' stroke='%2348525c' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5'><path d='M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z'/><line x1='12' y1='9' x2='12' y2='13'/><line x1='12' y1='17' x2='12.01' y2='17'/></svg>") center / 20px no-repeat;}
</style>
<div class="container"><br>
<div class="card shadow-sm rounded">
<div class="card-body">
<h5 class="text-dark pull-left"><b>Accounts</b></h5>
<?php
if(mysqli_num_rows(mysqli_query($connect,"select * from vhost_cpanel where client_id='".$user['client_id']."' and cpanel_status=1"))<3){
echo ' <a href="domainchecker.php" class="btn btn-info text-white btn-sm pull-right">Create Account</a>';
}?>
<div class="clearfix"></div><hr><?php if(isset($_SESSION['msg'])){echo $_SESSION['msg'];unset($_SESSION['msg']);}?>

<div class="table-responsive">
<table class="table table-striped table-hover table-condensed">
<thead>
<tr>
<th>ID</th>
<th>Account</th>
<th>Status</th>
<th>Date</th>
<th>Action</th>
</tr>
</thead>
<tbody>
<?php
if(mysqli_num_rows($sql)>0){
while($app=mysqli_fetch_assoc($sql)){
$id=$app['cpanel_username'];
$label=$app['cpanel_label'];
$count+=1;
$date=$app['cpanel_date'];
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
<td>#$count</td>
<td>$id</td>
<td>$status</td>
<td class='text-truncate'>$date</td>
<td><a href='account.php?aid=$id' class='btn btn-success btn-sm'>Manage</a></td>
</tr>";
}
}
else{
echo '<tr><td colspan="5" class="text-center">No Account Yet</td></tr>';
}
?>
</tbody>
</table>
</div><br>
<?php
if(mysqli_num_rows($sql)>2){
echo ' <p class="reg regAlert">You have reached the limit of three hosting accounts! <br/>Need more websites? Try <a href="../premium-hosting.php ">Premium Hosting</a>.';
}?>
<p class="mb-0"><small><?php echo mysqli_num_rows($sql);?>/3 Free Accounts</small></p>
</div>
</div>
</div><br>
</div>
