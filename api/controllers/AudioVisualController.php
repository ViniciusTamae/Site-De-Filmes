<?php
session_start();
require_once("../models/AudioVisual.php");

class AudioVisualController {
    protected $post;
    protected $img;

    //Setters
    public function setPost($post) {
        $this->post = $post;
    }
    public function setImg($img){
        $this->img = $img;
    }
    //Getters
    public function getPost() {
        return $this->post;
    }
    public function getImg(){
        return $this->img;
    }

    //Edita a capa de um livro
    public function editBookCover(){
        //getting the uploaded FILE post
        $img = $this->getImg();
    
        if (isset($img['image']['name']) && !empty($img['image']['name'])) {
            $target = $_SERVER['DOCUMENT_ROOT']."/assets/imgs/BookCover/".basename($img['image']['name']);
            move_uploaded_file($img['image']['tmp_name'], $target);
        }
        $audioVisual = new AudioVisual;
        $postResult = $this->getPost();
        $audioVisual->setId($postResult['bookEditId']);
        $audioVisual->setCover($img['image']['name']);
        
        $audioVisual->updateCover($audioVisual);
    
        $_SESSION['msg'] = "<p id='book_success' class='container'>Livro editado com sucesso</p>";
        header("Location: ../../frontend/page/cadastros?page=1");
        die();
    }

    //busca dinamicamente um livro
    public function searchBook($resultSearch){
        $audioVisual = new AudioVisual;
        return $audioVisual->selectLike($resultSearch);

    }

    public function getAudioVisual() {
        return 'ai caramba';
    }

}