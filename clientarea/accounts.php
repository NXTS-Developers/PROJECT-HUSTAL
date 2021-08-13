<?php
$title="Accounts";
$desc="";
include "includes/header.php";
?>
<div class="container">
<div class="card shadow-sm rounded">
<div class="card-body">
<h5 class="text-dark pull-left"><b>Accounts</b></h5>
<a href="domainchecker.php" class="btn btn-info text-white btn-sm pull-right">Create Account</a><div class="clearfix"></div><hr><?php if(isset($_SESSION['msg'])){echo $_SESSION['msg'];unset($_SESSION['msg']);}?>
<div class="table-responsive">
<table class="table table-striped table-hover table-condensed">
<thead>
<tr>
<th>Account</th>
<th>Status</th>
<th>Creation</th><th>Date</th>
<th>Action</th>
</tr>
</thead>
<tbody>
<?php
$sql=mysqli_query($connect,"select * from vhost_cpanel where client_id='".$user['client_id']."' order by cpanel_id desc");
if(mysqli_num_rows($sql)>0){
while($app=mysqli_fetch_assoc($sql)){
$id=$app['cpanel_username'];
$label=$app['cpanel_label'];
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
<td>$id</td>
<td>$status</td>
<td colspan='2'>$date</td>
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
</div>
<p><small><?php echo mysqli_num_rows($sql);?>/3 Free Accounts</small></p>
</div>
</div>
</div>
</div>