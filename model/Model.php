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

    public function verifyAccount(String $addr, String $agent, String $cookies) : String { 

        $sql = "SELECT * FROM users WHERE ipaddress = ? AND useragent = ? AND email = ?";
        $stmt = parent::getlink()->prepare($sql);
        $stmt->bindParam(1,$addr);
        $stmt->bindParam(2,$agent);
        $stmt->bindParam(3,$cookies);
        $stmt->execute();
        $clientEmail = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if($stmt->rowCount() > 0 || $cookies == $clientEmail[0]['email']){
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
              
                session_start();
                $_SESSION['userid'] = $row[0]['uid'];
                $_SESSION['username'] = $row[0]['username'];
                setcookie("persistent_cookie", $data['email'], time() + 30 * 24 * 60 * 60, "/");
                self::updateAccountParams ($data,$addr,$agent);
                return "true";
            }else{
                return "Wrong email or password";
            }
        }else{
            return "Wrong email or password";
        }
    }

    public function updateAccountParams (Array $data, String $addr, String $agent) : void {
            
            $sql = "UPDATE users SET ipaddress = ?, useragent = ? WHERE email = ?";
            $stmt = parent::getlink()->prepare($sql);
            $stmt->bindParam(1,$addr);
            $stmt->bindParam(2,$agent);
            $stmt->bindParam(3,$data['email']);
            $stmt->execute();
    }

    public function sendOTPcode() : string { // generate random 6 otp number

        $randomNumbers = array_map(
            function() { return random_int(1, 9); },
            array_fill(0, 6, null)
        );
        return implode("",$randomNumbers);

    }

    public function verifyAccountOTP(String $otpCode) : string { 
            
        $sql = "SELECT * FROM users WHERE code = ?";
        $stmt = parent::getlink()->prepare($sql);
        $stmt->bindParam(1,$otpCode);
        $stmt->execute();
        if($stmt->rowCount() > 0){
            $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
            session_start();
            $_SESSION['userid'] = $row[0]['uid'];
            $_SESSION['username'] = $row[0]['username'];
            return "true";
        }else{
            return "Invalid code";
        }
    }

    public function signOut(String $addr) : void {

        $agent = null;
        $ipaddres = null;
        $code = null;

        $sql = "UPDATE users SET ipaddress = ?, useragent = ?, code = ? WHERE ipaddress = ?";
        $stmt = parent::getlink()->prepare($sql);
        $stmt->bindParam(1,$ipaddres);
        $stmt->bindParam(2,$agent);
        $stmt->bindParam(3,$code);
        $stmt->bindParam(4,$addr);
        $stmt->execute();
        session_destroy();
        setcookie("persistent_cookie", "", time() - 3600, "/");

    }

    public function getOTPnumber(String $addr) : string {

        $sql = "SELECT * FROM users WHERE ipaddress = ?";
        $stmt = parent::getlink()->prepare($sql);
        $stmt->bindParam(1,$addr);
        $stmt->execute();
        if($stmt->rowCount() > 0){
            $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $row[0]['mobile'];
        }else{
            return "0553812345";
        }

    }

    public function updateOTP(String $addr, String $number) : void { 

        $sql = "UPDATE users SET code = ? WHERE ipaddress = ?";
        $stmt = parent::getlink()->prepare($sql);
        $stmt->bindParam(1,$number);
        $stmt->bindParam(2,$addr);
        $stmt->execute();

    }
    
    public function checkSession(){
        session_start();
        if(isset($_SESSION['userid'])){
            header("location:home.php");
        }
    }

}