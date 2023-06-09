<?php 
// var_dump($GLOBALS);
// $email = $_POST['email'];
// $password = $_POST['password'];
// $confpassword = $_POST['confpassword'];
// echo $email, $password, $confpassword;

// Verifie si les donnnées envoyées existe ou vide et rediriger vers connexion.php avec error=type d'error
if(!isset($_POST['email']) or !isset($_POST['password']) or !isset($_POST['confpassword']) ){
    header('Location: /connexion.php');
    exit;
} elseif($_POST['email'] == ""){
    header('Location: /connexion.php?error=identifiant');
    exit;
} elseif($_POST['password'] == ""){
    header('Location: /connexion.php?error=password');
    exit;
} elseif($_POST['confpassword'] == ""){
    header('Location: /connexion.php?error=confpassword');
    exit;
}

//Verifier password et confpassword, si defferant rediriger vers connexion.php avec error=PWdifferent
if($_POST['password'] != $_POST['confpassword']){
    header('Location: /connexion.php?error=PWdifferent');
    exit;
}


//Verifier si email existe deja dans la BDD:
// Si existe erreur=idExist donc p cpnnectez vous
include_once $_SERVER['DOCUMENT_ROOT'] . "/src/controllers/UserController.php";
$controller = new UserController(htmlspecialchars(($_POST['email'])));

if($controller->isExistDB()){
    header('Location: /connexion.php?warning=alreadyRegistered');
    exit;
}

// Si l'utilisateur n'existe pas dans la BDD, l'inscrire
$controller->signupUser(htmlspecialchars($_POST['password']));

header('Location: /connexion.php?success=registered');
exit;


?>
