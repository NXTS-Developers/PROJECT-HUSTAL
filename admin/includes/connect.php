<?php
ob_start();
session_start();
require "../includes/config.php";
$connect=mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
?>