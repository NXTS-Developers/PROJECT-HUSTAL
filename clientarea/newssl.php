<?php
$title="Create SSL";
$desc="";
include "includes/header.php";
?>
<div class="container"><br>
<div class="card shadow-sm rounded">
<div class="card-body">
<form action="function/createssl.php" method="post">
<h3 class="text-center">Create SSL</h3><hr>
<?php
if(isset($_SESSION['msg'])){
echo $_SESSION['msg'];
unset($_SESSION['msg']);
}
?>
<div class="mb-3">
<label class="form-label text-muted">Your Name</label>
<input type="text" name="name" class="form-control" value="<?php echo $user['client_name'];?>" readonly>
</div>
<div class="mb-3">
<label class="form-label text-muted">Email Address</label>
<input type="text" name="email" class="form-control" value="<?php echo $user['client_email'];?>" readonly>
</div>
<input type="hidden" name="id" value="<?php echo $user['client_id'];?>">
<div class="mb-3">
<label class="form-label text-muted">Domain</label>
<input type="text" name="domain" class="form-control"y>
</div>
<div class="mb-3">
<label class="form-label text-muted">Organization</label>
<input type="text" name="organization" class="form-control"y>
</div>
<div class="mb-3">
<label class="form-label text-muted">Organization Unit</label>
<input type="text" name="departament" class="form-control"y>
</div>
<div class="mb-3">
<label class="form-label text-muted">Country Code</label>
<input type="text" name="country" class="form-control"y>
</div>
<div class="mb-3">
<label class="form-label text-muted">State / Province</label>
<input type="text" name="state" class="form-control"y>
</div>
<div class="mb-3">
<label class="form-label text-muted">City</label>
<input type="text" name="city" class="form-control"y>
</div>
<div class="d-grid">
<input type="submit" name="create" class="btn btn-success" value="CREATE SSL">
</div>
</form>
</div>
</div> 
</div>
