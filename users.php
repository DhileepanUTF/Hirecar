<?php
    class Users{
    private $username;
    private $email;
    private $password;
    private $number;
    private $year;
    /*private $activated;
private $token;
private $createdon;*/
    public $conn;
    
    function setUsername($username) { $this->username = $username; }
    function getUsername() { return $this->username; }
    function setEmail($email) { $this->email = $email; }
    function getEmail() { return $this->email; }
    function setPassword($password) { $this->password = $password; }
    function getPassword() { return $this->password; }
    function setNumber($number) { $this->number = $number; }
    function getNumber() { return $this->number; }
    function setYear($year) { $this->year = $year; }
    function getYear() { return $this->year; }
    /*function setActivated($activated) { $this->activated = $activated; }
function getActivated() { return $this->activated; }
function setToken($token) { $this->token = $token; }
function getToken() { return $this->token; }
function setCreatedon($createdon) { $this->createdon = $createdon; }
function getCreatedon() { return $this->createdon; }
*/ 

    function __construct(){
        require 'db.php';
        $db = new db();
        $this->conn = $db->connect();
    }
    public function save(){
        $sql = "INSERT INTO `details`(`username`, `email`, `password`, `number`, `year`) VALUES (:username,:email,:password,:number,:year)";
        //$sql = "INSERT INTO `users`(`id`, `name`, `mobile`, `email`, `pass`, `activated`, `token`, `created_on`) VALUES (null,:name,:mobile,:email,:pass,:activated,:token,:cdate)";
        $stmt = $this->conn-> prepare($sql);
        $stmt->bindParam(':username',$this->username);
        $stmt->bindParam(':email',$this->email);
        $stmt->bindParam(':password',$this->password);
        $stmt->bindParam(':number',$this->number);
        $stmt->bindParam(':year',$this->year);
        /*$stmt->bindParam(':activated', $this->activated);
			$stmt->bindParam(':token', $this->token);
			$stmt->bindParam(':cdate', $this->createdon);*/ 


        if($stmt->execute()){
            return true;
        }
        else{return false;}

    }
    public function getUserByEmail() {
        $stmt = $this->conn->prepare('SELECT * FROM details WHERE email = :email');
        $stmt->bindParam(':email', $this->email);
        //$stmt->bindParam(':password',$this->password);
        try {
            if($stmt->execute()) {
                $user = $stmt->fetch(PDO::FETCH_ASSOC);
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        return $user;
    }
    public function getUserByUsername() {
        $stmt = $this->conn->prepare('SELECT * FROM details WHERE username = :username');
        //$stmt->bindParam(':email', $this->email);
        //$stmt->bindParam(':password',$this->password);
        $stmt->bindParam(':username',$this->username);
        try {
            if($stmt->execute()) {
                $user = $stmt->fetch(PDO::FETCH_ASSOC);
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        return $user;
    }
    }
    
?>