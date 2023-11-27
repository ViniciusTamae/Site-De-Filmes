<?php
session_start();

include_once("../../database/Connect.php");

class AudioVisual extends \Database\Connect {

    protected $id;
    protected $cover;
    protected $name;
    protected $duration;
    protected $rating;
    protected $typeId;
    protected $description;
    protected $genre;

    //Setters
    public function setId($id) {
        $this->id = $id;
    }

    public function setCover($cover) {
        $this->cover = $cover;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function setDuration($duration) {
        $this->duration = $duration;
    }

    public function setRating($rating) {
        $this->rating = $rating;
    }

    public function setTypeId($typeId) {
        $this->typeId = $typeId;
    }

    public function setDescription($description) {
        $this->description = $description;
    }

    public function setGenre($genre) {
        $this->genre = $genre;
    }


    public function getId() {
        return $this->id;
    }

    public function getCover() {
        return $this->cover;
    }

    public function getName() {
        return $this->name;
    }

    public function getDuration() {
        return $this->duration;
    }

    public function getRating() {
        return $this->rating;
    }

    public function getTypeId() {
        return $this->typeId;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getGenre() {
        return $this->genre;
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
    
    public function readFilter(int $limit, $type_id = null) {
        try {
            if ($type_id !== null) {

                $type_id = filter_var($type_id, FILTER_VALIDATE_INT);
    
                $sql = "SELECT av.*, t.name as type_name FROM audio_visual av
                        JOIN types t ON av.type_id = t.id
                        WHERE av.type_id = :type_id LIMIT :limit";
    
                $sqlSearch = $this->getConnection()->prepare($sql);
                $sqlSearch->bindParam(':type_id', $type_id, PDO::PARAM_INT);
                $sqlSearch->bindParam(':limit', $limit, PDO::PARAM_INT);
                $sqlSearch->execute();
            } else {
                $sql = "SELECT * FROM audio_visual LIMIT :limit";
    
                $sqlSearch = $this->getConnection()->prepare($sql);
                $sqlSearch->bindParam(':limit', $limit, PDO::PARAM_INT);
                $sqlSearch->execute();
            }
    
            $resultSearch = $sqlSearch->fetchAll(PDO::FETCH_ASSOC);
    
            return $resultSearch;
        } catch (Exception $e) {
            echo "Ocorreu um erro ao tentar buscar Todos." . $e;
        }
    }

    public function selectLike(string $search) {
        try {
            $sql = "SELECT * FROM audio_visual WHERE name like '%$search%'";

            $sqlSearch = $this->getConnection()->prepare($sql);
            $sqlSearch->execute(array());
            $resultSearch = $sqlSearch->fetchAll(PDO::FETCH_ASSOC);

            return $resultSearch;

        } catch (Exception $e) {
            echo "Ocorreu um erro ao Buscar os registros." . $e;
        }
    }

    public function getById($id) {
        try {
            $sql = "SELECT * FROM audio_visual where id = $id ";
                        
            $result = $this->getConnection()->prepare($sql);
            $result->execute(array());
            $resultSearch = $result->fetchAll(PDO::FETCH_ASSOC);

            return $resultSearch[0];
                    
        } catch (Exception $e) {
            echo "Erro ao buscar os registros <br>" . $e . '<br>';
        }
    }

    public function create(AudioVisual $audioVisual){
        try {
            $sql = "INSERT INTO audio_visual (                   
                  name, genre, type_id, duration, rating, description cover ) 
                  VALUES (:name, :genre, :typeId, :duration, :rating, :description :cover )";

            $audioVisualResults = $this->getConnection()->prepare($sql);
            $audioVisualResults->bindValue(":name", $audioVisual->getName());
            $audioVisualResults->bindValue(":genre", $audioVisual->getGenre());
            $audioVisualResults->bindValue("typeId", $audioVisual->getTypeId());
            $audioVisualResults->bindValue(":duration", $audioVisual->getDuration());
            $audioVisualResults->bindValue(":rating", $audioVisual->getRating());
            $audioVisualResults->bindValue(":description", $audioVisual->getDescription());
            $audioVisualResults->bindValue(":cover", $audioVisual->getCover());
            
            return $audioVisualResults->execute();
        } catch (Exception $e) {
            echo "Erro ao Inserir Registro <br>" . $e . '<br>';
        }
    }
}