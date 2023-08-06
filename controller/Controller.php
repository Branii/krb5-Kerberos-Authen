<?php 

    include "../model/Model.php";

    class Controller extends Model {
            
        public function registerAccount(Array $data) : String { 
            return parent::registerAccount($data);
        }

        public function verifyAccount(String $remoteAddress, String $userAgent) : String { 
            return parent::verifyAccount($remoteAddress,$userAgent);
        }

        public function authenticateAccount(Array $data, String $addr, String $agent) : string {
            return parent::authenticateAccount($data,$addr,$agent);
        }

    } // controller class for routing advance MVC php | very easy to understand

?>