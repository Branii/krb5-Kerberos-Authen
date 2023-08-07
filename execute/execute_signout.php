<?php 
session_start();
session_destroy();
include "../controller/Controller.php";
$ipAddress = $_SERVER['REMOTE_ADDR'];
(new Controller)->signOut($ipAddress);
header("location:../index.php");
?>