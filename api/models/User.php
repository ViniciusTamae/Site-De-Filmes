<?php
session_start();

include_once("../../database/Connect.php");

Class User extends \Database\Connect {
    protected $id;
    protected $userName;
    private $email;
    private $userPassword;
    protected $img;
    protected $bio;

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
    public function setImage($img) {
        $this->img = $img;
    }
    public function setBio($bio){
        $this->bio = $bio;
    }
    //Getters
    public function getId() {
        return $this->id;
    }
    public function getUserName() {
        return $this->userName;
    }
    public function getEmail() {
        return $this->email;
    }
    public function getUserPassword() {
        return $this->userPassword;
    }
    public function getImage() {
        return $this->img;
    }
    public function getBio(){
        return $this->bio;
    }
    
    //Create user
    public function create(){
        try {
            $sql = "INSERT INTO users (`name`, `email`, `password`, `bio`, `image`) 
            VALUES (:userName, :email, :userPassword, :bio, :image)";

            $userResult = $this->getConnection()->prepare($sql);

            $userResult->bindValue(":userName", $this->getUserName());
            $userResult->bindValue(":email", $this->getEmail());
            $userResult->bindValue(":userPassword", $this->getUserPassword());
            $userResult->bindValue(":bio", $this->getBio());
            $userResult->bindValue(":value", '/assets/imgs/profileImages/padrao.png');
            
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
                $_SESSION['user_id'] = $result[0]['id'];
                return $result;
            }else {
                return false;
            }            
        } catch (Exception $e) {
            echo "Erro ao Inserir usuario <br>" . $e . '<br>';
        }
    }

    public function getById($id) {
        try {
            $sql = "SELECT * FROM users where id = $id ";
                        
            $userResult = $this->getConnection()->prepare($sql);
            $userResult->execute(array());
            $resultSearch = $userResult->fetchAll(PDO::FETCH_ASSOC);

            return $resultSearch[0];
                    
        } catch (Exception $e) {
            echo "Erro ao Inserir usuario <br>" . $e . '<br>';
        }
    }

    public function updateImg(User $user){
        try {
            $sql = "UPDATE users SET image=:image WHERE id=:id";

            $result = $this->getConnection()->prepare($sql);
            $result->bindValue(":image", '/assets/imgs/profileImages/'.$user->getImage());
            $result->bindValue(":id", $user->getId());
            
            return $result->execute();
        } catch (Exception $e) {
            echo "Ocorreu um erro ao tentar fazer Update da Imagem<br> $e <br>";
        }
    }

}