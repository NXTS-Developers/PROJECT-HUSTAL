<?php
$title="Create Account";
$desc="";
include "includes/header.php";
?>
<div class="container">
<div class="card shadow-sm rounded">
<div class="card-body">
<form action="function/createaccount.php" method="post">
<h3 class="text-center">Create Account</h3><hr>
<?php
if(isset($_SESSION['msg'])){
echo $_SESSION['msg'];
unset($_SESSION['msg']);
}
?>
<div class="mb-3">
<label class="form-label text-muted">Label</label>
<input type="text" name="label" class="form-control" placeholder="Account Label">
</div>
<div class="mb-3">
<label class="form-label text-muted">Username</label>
<input type="text" name="username" class="form-control" pattern=".{8,8}" placeholder="Username: Must have 8 letters">
</div>
<div class="mb-3">
<label class="form-label text-muted">Domain</label>
<p class="text-muted"><?php echo $_SESSION['domain'];?></p>
</div>
<input type="hidden" name="domain" value="<?php echo $_SESSION['domain'];?>">
<input type="hidden" name="id" value="<?php echo $user['client_id'];?>">
<div class="mb-3">
<label class="form-label text-muted">Password</label>
<input type="password" name="password" class="form-control" pattern=".{8,35}" placeholder="Password: Must between 8 to 35 letters">
</div>
<div class="d-grid">
<input type="submit" name="create" class="btn btn-success" value="CREATE ACCOUNT">
</div>
</form>
</div>
</div> 
</div>