<?php
$title="Create Account";
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
<label class="form-label text-muted">CSR Code</label>
<textarea name="csr" class="form-control" rows="12"></textarea>
</div>
<div class="d-grid">
<input type="submit" name="create" class="btn btn-success" value="CREATE SSL">
</div>
</form>
</div>
</div> 
</div>
