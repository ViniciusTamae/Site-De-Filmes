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

    public function getAudioVisual() {
        return 'ai caramba';
    }

}