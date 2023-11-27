<?php
include_once("../controllers/AudioVisualController.php");

$controller = new AudioVisualController();
$controller->setPost(filter_input_array(INPUT_POST));

if(isset($_POST['register'])){
    $controller->setImg($_FILES);
    $controller->register();
}
else if (isset($_POST['redirect'])) {
    $id = intval($controller->getPost()['id']);
    header("Location: ../../front/pages/audioVisual?id=$id");
}
else if (isset($_POST['searchLike'])) {
    $postResult = $controller->getPost();
    
    $word = $postResult['search'];
    header("Location: ../../front/pages/searchResult?word=$word");
}