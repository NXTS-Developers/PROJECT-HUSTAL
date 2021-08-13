<?php
if(isset($_COOKIE['client'])){
header("location: ./home.php");
}
else{
header("location: ./login.php");
}
?>