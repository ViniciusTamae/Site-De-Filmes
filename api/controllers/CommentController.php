<?php
session_start();
require_once "../models/Comment.php";
class CommentController {

    protected $post;

    // Setters
    public function setPost($post){
        $this->post = $post;
    }

    // Getters
    public function getPost(){
        return $this->post;
    }

    public function register(){
        $comment = new Comment;
        $postResult = $this->getPost();
        $comment->setComment($postResult['comment']);
        $comment->setTitle($postResult['title']);
        $comment->setRating($postResult['rating']);
        $comment->setUserId(intval($postResult['user_id']));
        $comment->setAudioVisualId(intval($postResult['audio_visual_id']));
        $comment->create();
        
        header("Location: ../../front/pages/audioVisual?id=". $postResult['audio_visual_id']);
        die();
    }
}