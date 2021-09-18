<?php
$title="Check Domain";
$desc="";
include "includes/header.php";
?>
<style>
.switch-field {display: flex; margin-bottom: 36px; overflow: hidden; display: block; margin-right: auto; margin-left: auto;}
.switch-field input{position: absolute !important; clip: rect(0, 0, 0, 0); height: 1px; width: 1px; border: 0; overflow: hidden;}
.switch-field label{color: rgba(0, 0, 0, 0.6); font-size: 14px; line-height: 1; text-align: center; padding: 8px 16px; margin-right: -1px; border: 1px solid #e4e4e4; transition: all 0.1s ease-in-out;}
.switch-field label:hover{cursor: pointer;}
.switch-field input:checked + label{box-shadow: none; border: 1px solid #2696ff; color: #2696ff; background-color: #deefff;}
.switch-field label:first-of-type{border-radius: 4px 4px 4px 4px;}
.switch-field label:last-of-type{border-radius: 4px 4px 4px 4px;}
.reg{position:relative; padding:10px 10px 4px 40px; margin:0px 0px 15px 0px; font-size:.85rem; line-height:1.62em;border-radius:2px}
.reg:before{content:'';position:absolute;left:15px;top:15px; width:20px;height:20px;}
.regInfo{background-color:#d0efff;color:#187bcd}
.regInfo:before{background: url("data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='currentColor' stroke='%2301579b' stroke-width='0'><path d='M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z'/><path d='m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z'/></svg>") center / 20px no-repeat}
</style>
<div class="container"><br>
<div class="card shadow-sm rounded">
<div class="card-body">
<h4>Create Hosting Account</h4><hr>
<?php if(isset($_SESSION['msg'])){echo $_SESSION['msg'];unset($_SESSION['msg']);}?>
<h6>Domain Type</h6>
	<div class="switch-field">
		<input type="radio" id="defaultOpen" onclick="domainForm(event, 'subdomain')" name="switch-one" value="Subdomain"/>
		<label for="defaultOpen">Subdomain</label>
		<input id="radio-two" type="radio" onclick="domainForm(event, 'customdomain')" name="switch-one" value="Custom Domain" />
		<label for="radio-two">Custom Domain</label>
	</div>
<div id="subdomain" class="tabcontent">
<form action="function/domainchecker.php" name="" method="post">
<div class="mb-3">
<label class="form-label text-muted">Subdomain</label>
<input type="text" name="domain" class="form-control" placeholder="your-name"><br>
<label class="form-label text-muted">Domain Extension</label>
<select name="extension" class="form-control">
<option>.flexhost.ga</option>
<option>.erahost.ml</option>
<option>.rich-host.ga</option>
</select>
</div>
<p>You can add more domains after your account has been created.</p>
<div class="d-grid">
<input type="submit" name="check" class="btn btn-info text-white" value="CONTINUE"/>
</div>
</form>
</div>
<div id="customdomain" class="tabcontent">
<form action="function/domainchecker.php" name="" method="post">
<div class="reg regInfo">Your domain needs to point to our nameservers before you host it on our website.
<ul><li>ns1.byet.org</li><li>ns2.byet.org</li><li>ns3.byet.org</li><li>ns4.byet.org</li></ul></div>
<div class="mb-3">
<label class="form-label text-muted">Your Domain Name</label>
<input type="text" name="domain" class="form-control" placeholder="example.com"><br>
</div>
<p>You can add more domains after your account has been created.</p>
<div class="d-grid">
<input type="submit" name="check" class="btn btn-info text-white" value="CONTINUE"/>
</div>
</form>
</div>
</div>
</div>
</div>
</div>
<script>
function domainForm(evt, domainType) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(domainType).style.display = "block";
  evt.currentTarget.className += " active";
}
document.getElementById("defaultOpen").click();
</script>
