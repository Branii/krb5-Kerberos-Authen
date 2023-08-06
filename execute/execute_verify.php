<?php 
include "../controller/Controller.php";
$userAgent = $_SERVER['HTTP_USER_AGENT'];
$ipAddress = $_SERVER['REMOTE_ADDR'];
echo (new Controller)->verifyAccount($ipAddress,$userAgent);