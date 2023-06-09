<?php 
// var_dump($_POST);
// $email = $_POST['email'];
// $password = $_POST['password'];

// Verifie si les donnnées envoyées existe ou vide et rediriger vers connexion.php avec error=type d'error
if(!isset($_POST['email']) or !isset($_POST['password'])){
    header('Location: /connexion.php');
    exit;
} elseif ($_POST['email'] == "" || $_POST['password'] == ""){
    header('Location: /connexion.php?error=IDPW');
    exit;
}

// Verifier si email existe deja dans la BDD:
include_once $_SERVER['DOCUMENT_ROOT'] . "/src/controllers/UserController.php";
$controller = new UserController($_POST['email']);

// Si l'utilisateur n'existe pas 
if(!$controller->isExistDB()){
    header('Location: /connexion.php?error=notRegistered');
    exit;
}

// L'utilisateur existe dans la BDD alors connexion et redirection vers profil.php avec données de SESSION id et email :
// Verifie si le mot de passe correspond
if($controller->isPasswordCorrect($_POST['password'])){
    session_start();
    $_SESSION['id'] = $controller->getId();
    $_SESSION['email'] = $controller->getEmail();
    header('Location: /profil.php');
    exit;
}else{
    header('Location: /connexion.php?error=incorrect');
    exit;
}
