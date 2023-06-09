<?php 
session_start();
// var_dump($GLOBALS);

if(!isset($_GET['postID'])){
    header('Location: /index.php');
    exit;
}

$userIDco = $_SESSION['id'];
$postID = $_GET['postID'];
$contenuCom = $_POST['commentaire'];

include_once $_SERVER['DOCUMENT_ROOT'] . "/src/controllers/CommentaireController.php";

$controller = new CommentaireController($userIDco, $postID, htmlspecialchars($contenuCom));

$controller->addCommentaire();

header('Location: /index.php');
exit;
?>