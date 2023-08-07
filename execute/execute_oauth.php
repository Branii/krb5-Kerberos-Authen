<?php 
include "../controller/Controller.php";
$code = $_POST['code'];
echo (new Controller)->verifyAccountOTP($code);