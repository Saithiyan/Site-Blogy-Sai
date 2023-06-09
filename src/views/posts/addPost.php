<?php 
session_start();
$id = $_SESSION['id'];
// var_dump($_SESSION);
// var_dump($GLOBALS);


// Verifie si les donnnées envoyées existe ou vide et rediriger vers connexion.php avec error=type d'error
// Le titre c'est optionnel : !isset($_POST['titre'])
if(!isset($_POST['contenu'])){
    header('Location: /profil.php');
    exit;
} elseif ($_POST['contenu'] == ""){
    header("Location: /profil.php?id=$id&error=nocontenu");
    exit;
}
// echo phpinfo();


// Modifie le nom et l'emplacement du img
if(isset($_FILES['img']['name']) and $_FILES['img']['name'] != "" ){
    $infos = pathinfo($_FILES["img"]['name']);
    var_dump($infos);
    
    $bytes = random_bytes(20);
    // var_dump(bin2hex($bytes));
    $PostImgWhithID = '/img/PostImg/'. bin2hex($bytes).'.'. $infos['extension'];
    $cible = $_SERVER['DOCUMENT_ROOT'] . $PostImgWhithID;
    move_uploaded_file($_FILES["img"]['tmp_name'], $cible);
    
} else {
    $PostImgWhithID = null;
}
// $img = (isset($_FILES['img']['name']) and $_FILES['img']['name'] != "" )? $_FILES['img']['name']: null;

// Verifie si titre et image existe et affecte a une variable
$contenu = $_POST['contenu'];
$titre = (isset($_POST['titre']) and $_POST['titre'] != "" )? $_POST['titre']: null;
// echo $PostImgWhithID, $cible;


// Ajouter le post dans la BDD
include_once $_SERVER['DOCUMENT_ROOT'] . "/src/controllers/PostController.php";

$controller = new PostController($_SESSION['id'],htmlspecialchars($contenu),htmlspecialchars($titre), htmlspecialchars($PostImgWhithID));

$controller->addPost();

$id = $_SESSION['id'];
header("Location: /profil.php?id=$id");
exit;
?>