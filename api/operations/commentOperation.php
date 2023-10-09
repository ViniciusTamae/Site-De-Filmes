<?php

include_once("../controllers/CommentController.php");

$commentController = new CommentController();

$postResult = filter_input_array(INPUT_POST);
$commentController->setPost($postResult);

if (isset($_POST['createComment'])) {
    $commentController->register();
}