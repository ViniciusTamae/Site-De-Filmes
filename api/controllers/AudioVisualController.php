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

    public function register(){
        $cover = "scapa.jpg";

        //getting the uploaded FILE post
        $img = $this->getImg(); 
        if (isset($img['image']['name']) && !empty($img['image']['name'])) {
            $target = $_SERVER['DOCUMENT_ROOT']."/assets/imgs/BookCover/".basename($img['image']['name']);
            move_uploaded_file($img['image']['tmp_name'], $target);
            $cover = $img['image']['name'];
        }
        
        $audioVisual = new AudioVisual;
        $postResult = $this->getPost();

        $audioVisual->setName($postResult['name']);
        $audioVisual->setTypeId($postResult['typeId']);
        $audioVisual->setGenre($postResult['genre']);
        $audioVisual->setDuration($postResult['duration']);
        $audioVisual->setRating($postResult['rating']);
        $audioVisual->setCover($cover);
        
        $audioVisual->create($audioVisual);
        $_SESSION['msg'] = "<p id='book_success' class='container'>Livro cadastrado com sucesso</p>";
        header("Location: ../../frontend/page/cadastros?page=1");
        die();
        
    }

}