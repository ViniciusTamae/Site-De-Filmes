<?php
include_once("../../database/Connect.php");
// include_once("../controllers/UserController.php");
Class User extends Connect {
    protected $id;
    protected $userName;
    private $email;
    private $userPassword;

    //Setters
    public function setId($id){
        $this->id = $id;
    }
    public function setUserName($userName){
        $this->userName = $userName;
    }
    public function setEmail($email){
        $this->email = $email;
    }
    public function setUserPassword($userPassword){
        $this->userPassword = base64_encode($userPassword);
    }
    //Getters
    public function getId(){
        return $this->id;
    }
    public function getUserName(){
        return $this->userName;
    }
    public function getEmail(){
        return $this->email;
    }
    public function getUserPassword(){
        return $this->userPassword;
    }
    
    //Create user
    public function create(){
        try {
            $sql = "INSERT INTO users (`name`, `email`, `password`) 
            VALUES (:userName, :email, :userPassword)";

            $userResult = $this->getConnection()->prepare($sql);

            $userResult->bindValue(":userName", $this->getUserName());
            $userResult->bindValue(":email", $this->getEmail());
            $userResult->bindValue(":userPassword", $this->getUserPassword());
            
            return $userResult->execute();
        } catch (Exception $e) {
            echo "Erro ao Inserir usuario <br>" . $e . '<br>';
        }
    }
    //Read
    public function read() {
        try {
            $sql = "SELECT * FROM users where email = :email ";
                        
            $userResult = $this->getConnection()->prepare($sql);
            $userResult->bindValue(":email", $this->getEmail());
            $userResult->execute();
            $result = $userResult->fetchAll();

            if ($result[0]['password'] == $this->getUserPassword()) {
                return $result;
            }else {
                return false;
            }            
        } catch (Exception $e) {
            echo "Erro ao Inserir usuario <br>" . $e . '<br>';
        }
    }

}