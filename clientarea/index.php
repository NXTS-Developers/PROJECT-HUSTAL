<?php
if(isset($_COOKIE['client'])||$_COOKIE['client']!='NULL'){
header("location: ./home.php");
}
else{
header("location: ./login.php");
}
?>
