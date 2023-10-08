<?php
session_start();

include_once("../../database/Connect.php");

Class Comment extends \Database\Connect {
    protected $id;
    protected $title;
    protected $comment;
    protected $rating;
    protected $user_id;
    protected $audio_visual_id;


    public function setId($id){
        $this->id = $id;
    }
    public function setTitle($title){
        $this->title = $title;
    }
    public function setComment($comment){
        $this->comment = $comment;
    }
    public function setRating($rating){
        $this->rating = $rating;
    }
    public function setUserId($user_id){
        $this->user_id = $user_id;
    }
    public function setAudioVisualId($audio_visual_id){
        $this->audio_visual_id = $audio_visual_id;
    }

    // Getters
    public function getId() {
        return $this->id;
    }
    public function getTitle() {
        return $this->title;
    }
    public function getComment(){
        return $this->comment;
    }
    public function getRating(){
        return $this->rating;
    }
    public function getUserId(){
        return $this->user_id;
    }
    public function getAudioVisualId(){
        return $this->audio_visual_id;
    }
    
    public function create(){
        try {
            $sql = "INSERT INTO comments (`title`, `comment`, `rating`, `user_id`, `audio_visual_id`) 
            VALUES (:title, :comment, :rating, :user_id, :audio_visual_id)";

            $userResult = $this->getConnection()->prepare($sql);

            $userResult->bindValue(":title", $this->getTitle());
            $userResult->bindValue(":comment", $this->getComment());
            $userResult->bindValue(":rating", $this->getRating());
            $userResult->bindValue(":user_id", $this->getUserId());
            $userResult->bindValue(":audio_visual_id", $this->getAudioVisualId());
            
            return $userResult->execute();
        } catch (Exception $e) {
            echo "Erro ao Inserir comentario <br>" . $e . '<br>';
        }
    }
    
    public function getByAudioVisualId($id) {
        try {
            $sql = "SELECT users.*, comments.*
                FROM users
                INNER JOIN comments ON users.id = comments.user_id
                WHERE comments.audio_visual_id = $id;";
                        
            $result = $this->getConnection()->prepare($sql);
            $result->execute(array());
            $resultSearch = $result->fetchAll(PDO::FETCH_ASSOC);

            return $resultSearch;
                    
        } catch (Exception $e) {
            echo "Erro ao recuperar os registros <br>" . $e . '<br>';
        }
    }

    public function getUserLastComment($id) {
        try {
            $sql = "SELECT * FROM comments WHERE user_id = $id ORDER BY id DESC LIMIT 1;";

            $result = $this->getConnection()->prepare($sql);
            $result->execute(array());
            $resultSearch = $result->fetchAll(PDO::FETCH_ASSOC);

            return $resultSearch[0];

        } catch (Exception $e) {
            echo "Ocorreu um erro ao tentar buscar os comentarios<br> $e <br>";
        }
    }

}