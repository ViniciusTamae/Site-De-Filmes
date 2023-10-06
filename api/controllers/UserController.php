<?php
session_start();
require_once "../models/User.php";
class UserController {
    protected $post;
    public function setPost($post){
        $this->post = $post;
    }
    public function getPost(){
        return $this->post;
    }
    public function login() {
        $user = new User;
        $postResult = $this->getPost();
        $user->setEmail($postResult['email']);
        $user->setUserPassword($postResult['password']);
    
        $result = $user->read();
        
        if ($result) {
            $_SESSION['logged'] = true ;
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
            $user->create();
            
            header("Location: ../../front/pages/login");
            die();
        }
        public function logout(){
            unset($_SESSION['logged']);
            header("Location: ../../front/pages/login");
            die();
        }
}