<?php
$title='SSL #'. $_GET['sid'];
$desc="";
include "includes/header.php";
require '../vendor/gogetssl/GoGetSSLApi.php';
$sql=mysqli_query($connect,"select * from vhost_ssl where ssl_key='".$_GET['sid']."' and client_id='".$user['client_id']."'");
if(!mysqli_num_rows($sql)>0){
	header('location: ssls.php');
}
$apiClient = new GoGetSSLApi();
$token = $apiClient->auth(SSL_USERNAME,SSL_PASSWORD);
$app = $apiClient->getOrderStatus($_GET['sid']);
			if($app['status']=='processing'){
				$Status = '<span class="badge bg-primary">Processing</span>';
			} elseif($app['status']=='active'){
				$Status = '<span class="badge bg-success">Active</span>';
			} elseif($app['status']=='cancelled'){
				$Status = '<span class="badge bg-danger">Cancelled</span>';
			} elseif($app['status']=='expired'){
				$Status = '<span class="badge bg-danger">Expired</span>';
			}
			if(empty($app['begin_date'])){
				$Begin = '-- -- ----';
				$End = $Begin;
			}
			else{
				$Begin = $app['begin_date'];
				$End = $app['end_date'];
			}
?>
<div class="container"><br>
<div class="card card-body">
<div class="row">
			<div class="col-md-6">
<div class="d-flex justify-content-between align-items-center mx-1 my-1">
	<b>Status:</b>
	<span><?php echo $Status;?></span>
</div>
			</div>
			<div class="col-md-6">
<div class="d-flex justify-content-between align-items-center mx-1 my-1">
	<b>Domain Name:</b>
	<span><?php echo $app['domain'];?></span>
</div>
			</div>
			<div class="col-md-6">
<div class="d-flex justify-content-between align-items-center mx-1 my-1">
	<b>Start Date:</b>
	<span><?php echo $Begin;?></span>
</div>
			</div>
			<div class="col-md-6">
<div class="d-flex justify-content-between align-items-center mx-1 my-1">
	<b>End Date:</b>
	<span><?php echo $End;?></span>
</div>
			</div>
			<div class="col-md-6">
<div class="d-flex justify-content-between align-items-center mx-1 my-1">
	<b>Method:</b>
	<span>DNS</span>
</div>
			</div>
			<?php if($app['status']=='processing'){ 
				$Record = explode(' ',$app['approver_method']['dns']['record']);
			?>
			<div class="col-md-12">
<div class="my-1 mx-2">
	<b>CSR Code:</b>
	<pre class="my-0"><textarea class="form-control" style="height: 250px" readonly><?php echo $app['csr_code'];?></textarea></pre>
</div>
<div class="mx-1 my-1">
	<b>CNAME Record:</b>
	<pre class="my-0"><input type="text" class="form-control" value="<?php echo $Record['0'];?>" readonly></pre>
</div>
<div class="mx-1 my-1">
	<b>Record Content:</b>
	<pre class="my-0"><input type="text" class="form-control" value="<?php echo $Record['2'];?>" readonly></pre>
</div>
			</div>
			<?php } elseif($app['status']=='active'){ ?>
			<div class="col-lg-12">
<div class="my-1 mx-2">
	<b>Certificate Code:</b>
	<pre class="my-0"><textarea class="form-control" style="height: 250px" readonly><?php echo $app['crt_code'];?></textarea></pre>
</div>
			</div>
			<div class="col-lg-12">
<div class="my-1 mx-2">
	<b>CA Bundle:</b>
	<pre class="my-0"><textarea class="form-control" style="height: 250px" readonly><?php echo $app['ca_code'];?></textarea></pre>
</div>
			</div>
			<?php } elseif($app['status']=='cancelled'){ ?>
			<div class="col-lg-12">
<div class="my-1 mx-2">
	<b>CSR Code:</b>
	<pre class="my-0"><textarea class="form-control" style="height: 250px" readonly><?php echo $app['csr_code'];?></textarea></pre>
</div>
			</div>
			<?php } elseif($app['status']=='expired'){ ?>
			<div class="col-lg-12">
<div class="my-1 mx-2">
	<b>Certificate Code:</b>
	<pre class="my-0"><textarea class="form-control" style="height: 250px" readonly>-----</textarea></pre>
</div>
			</div>
			<div class="col-lg-12">
<div class="my-1 mx-2">
	<b>CA Bundle:</b>
	<pre class="my-0"><textarea class="form-control" style="height: 250px" readonly>-----</textarea></pre>
</div>
			</div>
			<?php } ?>
</div><br>
