<?php 
session_start();

if(!isset($_SESSION['id'])){
    header('Location: /index.php');
    exit;
}

include_once $_SERVER['DOCUMENT_ROOT'] . "/src/controllers/PostController.php";

$controller = new PostController($_SESSION['id']);

$controller->deletePostWhithId($_GET['id']);

header('Location: /profil.php');
exit;
?>