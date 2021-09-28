<?php
require 'connect.php';
require "../../includes/config.php";
require '../../vendor/gogetssl/GoGetSSLApi.php';
$CSRData = array(
    'csr_commonname' => $_POST['domain'],
    'csr_organization' => $_POST['organization'],
    'csr_department' => $_POST['departament'],
    'csr_city' => $_POST['city'],
    'csr_state' => $_POST['state'],
    'csr_country' => $_POST['country'],
    'csr_email' => $_POST['email']
);
$apiClient = new GoGetSSLApi();
$token = $apiClient->auth(SSL_USERNAME, SSL_PASSWORD);
$csrorder = $apiClient->generateCSR($CSRData);
$csr_code = $csrorder['csr_code'];
if(isset($_POST['create'])){
	$Country = 'PK';
	$Company = 'Hostella';
	$Phone = '03000000000';
	$City = 'Lahore';
	$Postal = '54000';
	$Email = $_POST['email'];
	$Address = 'Street 45C ARU';
	$ID = $_POST['id'];
	$Name = $_POST['name'];
	$FormData = array(
		'product_id'       => 65,
		'csr' 			   => $csr_code,
	    'server_count'     => "-1",
	    'period'           => 3,
	    'approver_email'   => 'mahtabhassan159@gmail.com',
	    'webserver_type'   => "1",
	    'admin_firstname'  => $Name,
	    'admin_lastname'   => $Name,
	    'admin_phone'      => $Phone,
	    'admin_title'      => "Mr",
	    'admin_email'      => $Email,
	    'tech_firstname'   => $Name,
	    'tech_lastname'    => $Name,
	    'tech_phone'       => $Phone,
	    'tech_title'       => "Mr",
	    'tech_email'       => $Email,
	    'org_name'         => $Company,
	    'org_division'     => "Hosting",
	    'org_addressline1' => $Address,
	    'org_city'         => $City,
	    'org_country'      => $Country,
	    'org_phone'        => $Phone,
	    'org_postalcode'   => $Postal,
	    'org_region'       => "None",
	    'dcv_method'       => "dns",
	);
	$apiClient = new GoGetSSLApi();
	$token = $apiClient->auth(SSL_USERNAME, SSL_PASSWORD);
	$Data = $apiClient->addSSLOrder($FormData);
	$csr_key = $csrorder['csr_key'];
	if(count($Data)>4){
		$sql = mysqli_query($connect,"INSERT INTO `vhost_ssl`(`ssl_key`,`client_id`,`private_key`) VALUES ('".$Data['order_id']."','".$ID."','".$csr_key."')");
		if($sql){
			$_SESSION['msg'] = '<div class="alert alert-success" role="alert">
										  <button class="close" data-dismiss="alert" type="button" aria-label="Close">
										    <span aria-hidden="true">&times;</span>
										  </button>
										  SSL requested <b>successfully!</b>
										</div>';
			header('location: ../ssls.php');
		}
		else{
			$_SESSION['msg'] = '<div class="alert alert-danger" role="alert">
										  <button class="close" data-dismiss="alert" type="button" aria-label="Close">
										    <span aria-hidden="true">&times;</span>
										  </button>
										  Something went'."'".' <b>wrong!</b>
										</div>';
			header('location: ../newssl.php');
		}
	}
	else{
		$_SESSION['msg'] = '<div class="alert alert-danger" role="alert">
										  <button class="close" data-dismiss="alert" type="button" aria-label="Close">
										    <span aria-hidden="true">&times;</span>
										  </button>
										  '.$Data['message'].'
										</div>';
		header('location: ../newssl.php');
	}
}
?>
