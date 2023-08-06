<?php
include "../config/Database.php";
class Model extends Database implements Throwable{

    public function registerAccount(Array $data) : string { 

        if(self::checkIfAccountExist($data) == false){

            $hash = password_hash($data["password"],PASSWORD_BCRYPT);
            $array = array($data["username"],$data["email"],$data["moible"],$hash);
            $sql = "INSERT INTO users (username,email,mobile,password) VALUES (?,?,?,?)";
            $stmt = self::getlink()->prepare($sql);
            if($stmt->execute($array)){
                return "Account created successfully";
            }else{
                throw new Model("Some error occured!!");
            }

        }else{
          return "Account already exist!!!";
        }
    }

    public function verifyAccount(String $addr, String $agent) : String { 

        $sql = "SELECT * FROM users WHERE ipaddress = ? AND useragent = ?";
        $stmt = parent::getlink()->prepare($sql);
        $stmt->bindParam(1,$addr);
        $stmt->bindParam(2,$agent);
        $stmt->execute();
        if($stmt->rowCount() > 0){
            return "true";
        }else{
            return "false";
        }

    }

    public function checkIfAccountExist(Array $data) : bool {

        $sql = "SELECT * FROM users WHERE email = ? OR mobile = ?";
        $stmt = parent::getlink()->prepare($sql);
        $stmt->bindParam(1,$data['email']);
        $stmt->bindParam(2,$data['mobile']);
        $stmt->execute();
        if($stmt->rowCount() > 0){
            return true;
        }else{
            return false;
        }
    }
  
    public function authenticateAccount (Array $data, String $addr, String $agent) : string { 

        $sql = "SELECT * FROM users WHERE email = ?";
        $stmt = parent::getlink()->prepare($sql);
        $stmt->bindParam(1,$data['email']);
        $stmt->execute();
        if($stmt->rowCount() > 0){
            $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if(password_verify($data['password'],$row[0]['password'])){

                $value = "your_value";
                setcookie("persistent_cookie", $value, time() + 30 * 24 * 60 * 60, "/");

                return "true";
            }else{
                return "Wrong email or password";
            }
        }else{
            return "Wrong email or password";
        }
    }
}