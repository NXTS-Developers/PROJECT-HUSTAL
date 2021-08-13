<?php
$title="Accounts";
$desc="";
include "includes/header.php";
?>
<div class="container"><br>
<div class="card">
<div class="card-body">
<h5 class="text-muted"><b>Client Accounts</b></h5><hr><?php if(isset($_SESSION['msg'])){echo $_SESSION['msg'];unset($_SESSION['msg']);}?>
<div class="table-responsive-sm">
<table class="table table-striped">
<thead>
<tr>
<th>ID</th>
<th>Email</th>
<th>Status</th>
<th>cPanel</th>
<th>Action</th>
</tr>
</thead>
<tbody>
<?php
$sql=mysqli_query($connect,"select * from vhost_client order by client_id desc");
if(mysqli_num_rows($sql)>0){
while($app=mysqli_fetch_assoc($sql)){
$id=$app['client_id'];
$email=$app['client_email'];
$acc=mysqli_num_rows(mysqli_query($connect,"select cpanel_id from vhost_cpanel where client_id='$id'"));
if($app['client_status']==1){
$status=" <span class='badge bg-success'> Verified </span>";
}
else{
$status="<span class='badge bg-danger'> Unverified </span>";
}
echo "<tr>
<td>$id</td>
<td>$email</td>
<td>$status</td>
<td>$acc</td>
<td><a href='client.php?cid=$id' class='btn btn-success btn-sm'>Manage</a></td>
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
<p><small><?php echo mysqli_num_rows($sql);?> accounts found</small></p>
</div>
</div>
</div>
</div>