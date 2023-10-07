<?php

use Database\Connect;
class AudioVisual extends Connect {

    protected $id;
    protected $cover;

    //Setters

    public function setId($id) {
        $this->id = $id;
    }

    public function setCover($cover) {
        $this->cover = $cover;
    }

    public function getId() {
        return $this->id;
    }

    public function getCover() {
        return $this->cover;
    }

    // Métodos
    public function read(){
        try {
            $sql = "SELECT * FROM audio_visual";

            $sqlSearch = $this->getConnection()->prepare($sql);
            $sqlSearch->execute(array());
            $resultSearch = $sqlSearch->fetchAll(PDO::FETCH_ASSOC);

            // var_dump($resultSearch[0]['name']);

            return $resultSearch;

        } catch (Exception $e) {
            echo "Ocorreu um erro ao tentar buscar todos os registros." . $e;
        }
    }

    public function updateCover(AudioVisual $audioVisual) {
        try {
            $sql = "UPDATE books SET book_cover=:bookCover WHERE id=:id";

            $result = $this->getConnection()->prepare($sql);
            $result->bindValue(":id", $audioVisual->getId());
            $result->bindValue(":bookCover", $audioVisual->getCover());
            
            return $result->execute();

        } catch (Exception $e) {
            echo "Ocorreu um erro ao tentar fazer Update da capa livro<br> $e <br>";
        }
    }
    
    public function readFilter(int $limit, $type = '') {
        try {

            if (!empty($type)) {
                $sql = "SELECT * FROM audio_visual WHERE type = '$type' LIMIT $limit";
            } 
            else {
                $sql = "SELECT *  FROM audio_visual LIMIT $limit";
            }   

            $sqlSearch = $this->getConnection()->prepare($sql);
            $sqlSearch->execute(array());
            $resultSearch = $sqlSearch->fetchAll(PDO::FETCH_ASSOC);

            return $resultSearch;

        } catch (Exception $e) {
            echo "Ocorreu um erro ao tentar buscar Todos." . $e;
        }
    }

    public function selectLike(string $searchBook) {
        try {
            $sql = "SELECT * FROM books WHERE book_name like '%$searchBook%'";

            $sqlSearch = $this->getConnection()->prepare($sql);
            $sqlSearch->execute(array());
            $resultSearch = $sqlSearch->fetchAll(PDO::FETCH_ASSOC);

            return $resultSearch;

        } catch (Exception $e) {
            echo "Ocorreu um erro ao Buscar os registros." . $e;
        }
    }
}