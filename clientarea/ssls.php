<?php
$title="SSL";
$desc="";
include "includes/header.php";
include '../vendor/gogetssl/GoGetSSLApi.php';
?>
<div class="container"><br>
<div class="card shadow-sm rounded">
<div class="card-body">
<h5 class="text-dark pull-left"><b>SSL</b></h5>
<a href="newssl.php" class="btn btn-info text-white btn-sm pull-right">Create SSL</a><div class="clearfix"></div><hr><?php if(isset($_SESSION['msg'])){echo $_SESSION['msg'];unset($_SESSION['msg']);}?>
<div class="table-responsive">
<table class="table table-striped table-hover table-condensed">
<thead>
<tr>
<th>ID</th>
<th>Domain</th>
<th>Status</th>
<th>Method</th>
<th>Action</th>
</tr>
</thead>
<tbody>
<?php
$sql=mysqli_query($connect,"select * from vhost_ssl where client_id='".$user['client_id']."' order by ssl_id desc");
if(mysqli_num_rows($sql)>0){
while($ssl=mysqli_fetch_assoc($sql)){
$apiClient = new GoGetSSLApi();
$token = $apiClient->auth(SSL_USERNAME,SSL_PASSWORD);
$app =  $apiClient->getOrderStatus($ssl['ssl_key']);
$id=$app['order_id'];
$domain=$app['domain'];
$method='DNS';
if($app['status']=='processing'){
$status=" <span class='badge bg-primary'> Processing </span>";
}
elseif($app['status']=='active'){
$status="<span class='badge bg-success'> Active </span>";
}
elseif($app['status']=='cancelled'){
$status="<span class='badge bg-warning'> Cancelled </span>";
}
elseif($app['status']=='expired'){
$status="<span class='badge bg-danger'> Expired </span>";
}
echo "<tr>
<td>#$id</td>
<td>$domain</td>
<td>$status</td>
<td>DNS</td>
<td><a href='ssl.php?sid=$id' class='btn btn-success btn-sm'>Manage</a></td>
</tr>";
}
}
else{
echo '<tr><td colspan="5" class="text-center">No SSL Yet</td></tr>';
}
?>
</tbody>
</table>
</div>
</div>
</div>
</div>
</div>
