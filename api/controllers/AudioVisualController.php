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
            $target = $_SERVER['DOCUMENT_ROOT'] . "/assets/imgs/covers/" . basename($img['image']['name']);

            // Verifique a extensão do arquivo
            $fileExtension = pathinfo($target, PATHINFO_EXTENSION);

            if ($fileExtension === 'webp') {

                $target = preg_replace('/\.(webp)$/', '.png', $target);
            }

            move_uploaded_file($img['image']['tmp_name'], $target);
            $cover = $img['image']['name'];
        }
        
        $audioVisual = new AudioVisual;
        $postResult = $this->getPost();

        $genres = array_map('trim', explode(',', $postResult['genre']));
        $genreResult = ['generos' => []];
        
        foreach ($genres as $genre) {
            $genreResult['generos'][] = ['genero' => $genre];
        }

        $audioVisual->setName($postResult['name']);
        $audioVisual->setTypeId($postResult['typeId']);
        $audioVisual->setGenre(json_encode($genreResult));
        $audioVisual->setDuration($postResult['duration']);
        $audioVisual->setDescription($postResult['description']);
        $audioVisual->setRating($postResult['rating']);
        $audioVisual->setCover($cover);

        $audioVisual->create($audioVisual);
        header("Location: ../../");
        die();
        
    }

    public function delete(){
        $audioVisual = new AudioVisual;
        $postResult = $this->getPost();

        $audioVisual->setId($postResult['id']);
        $audioVisual->delete($audioVisual);
    
        header("Location: ../../front/pages/editTypes");
        die();
    }

    public function edit(){
        
        $img = $this->getImg();
        $cover = '';
        if (isset($img['image']['name']) && !empty($img['image']['name'])) {
            $target = $_SERVER['DOCUMENT_ROOT'] . "/assets/imgs/covers/" . basename($img['image']['name']);
            
            // Verifique a extensão do arquivo
            $fileExtension = pathinfo($target, PATHINFO_EXTENSION);
            
            if ($fileExtension === 'webp') {
                
                $target = preg_replace('/\.(webp)$/', '.png', $target);
            }
            
            move_uploaded_file($img['image']['tmp_name'], $target);
            $cover = $img['image']['name'];
        }
        
        $audioVisual = new AudioVisual;
        $postResult = $this->getPost();

        $genres = array_map('trim', explode(',', $postResult['genre']));
        $genreResult = ['generos' => []];
        
        foreach ($genres as $genre) {
            $genreResult['generos'][] = ['genero' => $genre];
        }

        $audioVisual->setId($postResult['id']);
        $audioVisual->setName($postResult['name']);
        $audioVisual->setTypeId($postResult['typeId']);
        $audioVisual->setGenre(json_encode($genreResult));
        $audioVisual->setDuration($postResult['duration']);
        $audioVisual->setDescription($postResult['description']);
        $audioVisual->setRating($postResult['rating']);
        $audioVisual->setCover($cover);
        $audioVisual->update($audioVisual);
    
        header("Location: ../../front/pages/editTypes");
        die();
    }

}