<?php 

    class Config {
     
        private $host = "mysql:host=localhost;dbname=kerb";
        private $user = "root";
        private $pass = "root";
    

        public function getHost() {
            return $this->host;
        }

        public function getUser() {
            return $this->user;
        }

        public function getPass() {
            return $this->pass;
        }

    }

?>