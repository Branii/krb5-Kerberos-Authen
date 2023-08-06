<?php 

include "Config.php";
class Database extends Exception implements Throwable {
   
   private $con;

   public function getlink () : PDO | String {

    try {
    
        $this->con = new PDO(
            (new Config)->getHost(),
            (new Config)->getUser(),
            (new Config)->getPass()
        );

        return $this->con;
    
       } catch (\Throwable $th) {
        
        return new Database(0,$th->getMessage(),$th);
    
       }
   }
} 
# this is your connection to mysql database, you can re-configure as you wish

?>