<?php 

    include "../model/Model.php";

    class Controller extends Model {
            
        public function registerAccount(Array $data) : String { 
            return parent::registerAccount($data);
        }

        public function verifyAccount(String $remoteAddress, String $userAgent, String $cookies) : String { 
            return parent::verifyAccount($remoteAddress,$userAgent,$cookies);
        }

        public function authenticateAccount(Array $data, String $addr, String $agent) : string {
            return parent::authenticateAccount($data,$addr,$agent);
        }

        public function verifyAccountOTP(String $code) : string {
            return parent::verifyAccountOTP($code);
        }

        public function signOut(String $addr) : void { 
            parent::signOut($addr);
        }

        public  function getOTPnumber(String $addr) : string { 
            return parent::getOTPnumber($addr);
        }

        public function updateOTP(String $addr, String $number) : void {
            parent::updateOTP($addr,$number);
        }

        public function checkSessionSet() {
            return parent::checkSessionSet();
        }

        public function checkSessionunSet() {
            return parent::checkSessionunSet();
        }

    } // controller class for routing advance MVC php | very easy to understand

?>