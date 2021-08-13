<?php
include "includes/connect.php";
if(isset($_GET['aid'])){ 
$sql=mysqli_fetch_assoc(mysqli_query($connect,"select cpanel_password from vhost_cpanel where cpanel_username='".$_GET['aid']."'"));
?>
<html>
<head>
<title>Login into cpanel</title>
<link rel="stylesheet" href="../template/css/bootstrap.min.css">
<meta name="viewport" content="width=device-width">
</head>
<body>
<div class="container">
<div class="card" style="margin-top:20%;">
<div class="card-body"><br>
<h5 class="text-center">Login into <?php echo $_GET['aid'];?></h5>
<p class="text-muted text-center">You are about to redirect if you didnot redirected within 5 seconds please click on button bellow</p>
<form action="https://cpanel.<?php echo SITE_ADDR?>/login.php" id="login" method="post" name="login">
<input type="hidden" name="uname" value="<?php echo $_GET['aid'];?>" alt="username">
<input type="hidden" name="passwd" value="<?php echo $sql['cpanel_password'];?>" alt="password">
<div class="d-grid">
<input type="submit" name="Submit" value="Click here to Redirect" class="btn btn-outline-success">
</div>
</form>
<script type="text/javascript">
document.getElementById('login').submit(); // SUBMIT FORM 
</script>
</body>
</html>
<?php
}
?>