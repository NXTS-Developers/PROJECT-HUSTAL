<?php
$title="Check Domain";
$desc="";
include "includes/header.php";
?>
<div class="container">
<div class="card shadow-sm rounded">
<div class="card-body">
<h3 class="text-center">Domain Selection</h3><hr>
<?php if(isset($_SESSION['msg'])){echo $_SESSION['msg'];unset($_SESSION['msg']);}?>
<form action="function/domainchecker.php" name="" method="post">
<div class="mb-3">
<label class="form-label text-muted">Subdomain name</label>
<input type="text" name="domain" class="form-control" placeholder="Check subdomain availabilty"><br>
<label class="form-label text-muted">Subdomain extension</label>
<select name="extension" class="form-control">
<option>.flexhost.ga</option>
<option>.erahost.ml</option>
<option>.rich-host.ga</option>
</select>
</div>
<div class="d-grid">
<input type="submit" name="check" class="btn btn-info text-white" value="CHECK AVAILABILTY">
</div>
</div>
</div>
</div>
</div>
