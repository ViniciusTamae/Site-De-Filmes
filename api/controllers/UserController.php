<?php
session_start();
require_once "../models/User.php";
class UserController {

    protected $post;
    protected $img;

    // Setters
    public function setPost($post){
        $this->post = $post;
    }
    public function setImg($img){
        $this->img = $img;
    }

    // Getters
    public function getPost(){
        return $this->post;
    }
    public function getImg(){
        return $this->img;
    }
    public function login() {
        $user = new User;
        $postResult = $this->getPost();
        $user->setEmail($postResult['email']);
        $user->setUserPassword($postResult['password']);
    
        $result = $user->read();
        
        if ($result) {
            $_SESSION['logged'] = true;
            header("Location: ../../front/pages/ratings");
            die();
        }
        else {
            $_SESSION['message'] = "<span style='color: red;'>Erro! usuario ou senha invalida<br></span>";
            header("Location: ../../front/pages/login");
            die();
        }
    }
        public function register(){
            $user = new User;
            $postResult = $this->getPost();
            $user->setUserName($postResult['userName']);
            $user->setEmail($postResult['email']);
            $user->setUserPassword($postResult['password']);
            $user->setBio($postResult['bio']);
            $user->create();
            
            header("Location: ../../front/pages/login");
            die();
        }
        public function logout(){
            unset($_SESSION['logged']);
            unset($_SESSION['user_id']);
            header("Location: ../../front/pages/login");
            die();
        }

    public function editImage(){
        
        $img = $this->getImg();
    
        if (isset($img['image']['name']) && !empty($img['image']['name'])) {
            $target = $_SERVER['DOCUMENT_ROOT'] . "/assets/imgs/profileImages/" . basename($img['image']['name']);
            
            // Verifique a extensão do arquivo
            $fileExtension = pathinfo($target, PATHINFO_EXTENSION);
            
            if ($fileExtension === 'webp') {
                
                $target = preg_replace('/\.(webp)$/', '.png', $target);
            }
            
            move_uploaded_file($img['image']['tmp_name'], $target);
        }

        $user = new User;
        $postResult = $this->getPost();
        $userId = $postResult['user_id'];
        
        $user->setId($postResult['user_id']);
        $user->setImage(basename($target));
        
        $user->updateImg($user);
        
        $_SESSION['msg'] = "<p id='book_success' class='container'>Livro editado com sucesso</p>";
        header("Location: ../../front/pages/profile?id=$userId");
        die();
    }
}