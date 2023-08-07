<?php 

if (isset($_COOKIE['timer'])) {
    exit("Please wait for 1 min.");
}

include_once ("../ZenophSMSGH/lib/ZenophSMSGH.php");
include "../controller/Controller.php";
$zs = new ZenophSMSGH();
$zs->setUser('braniiblack@gmail.com');
$zs->setPassword('123456qwerty');
$zs->setMessageType(ZenophSMSGH_MESSAGETYPE::TEXT);
$zs->setSenderId('SCHOBY BUS');
$ipAddress = $_SERVER['REMOTE_ADDR'];
$message = (new Controller)->sendOTPcode();
$mobile = (new Controller)->getOTPnumber($ipAddress);
$zs->SetMessage($message);
$zs->addDestination($mobile);
    
// send the message.
$response = $zs->sendMessage();
if($response){
    echo "Message Sent";
    (new Controller)->updateOTP($ipAddress,$message);
    setcookie("timer", $message, time() + 60, "/");

}else{
    echo "Could not send the message";
}
