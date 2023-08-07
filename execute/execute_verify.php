<?php 
include "../controller/Controller.php";
$userAgent = $_SERVER['HTTP_USER_AGENT'];
$ipAddress = $_SERVER['REMOTE_ADDR'];
$cookies = isset($_COOKIE['persistent_cookie']) ? $_COOKIE['persistent_cookie'] : "";
echo (new Controller)->verifyAccount($ipAddress,$userAgent,$cookies);