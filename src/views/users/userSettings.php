<?php
session_start();
// var_dump($_SESSION);

// var_dump($_FILES);
// var_dump($GLOBALS);

include_once $_SERVER['DOCUMENT_ROOT'] . "/src/controllers/UserController.php";

$controller = new UserController($_SESSION['email']);

if(!isset($_GET['add'])){
    header('Location: /index.php');
    exit;
    // echo "test get add existpas";
} elseif ($_GET['add'] == 'userPP'){

    if(!isset($_FILES['img']) or $_FILES['img'] == ""){
        header('Location: /profil.php');
        exit;
        // echo "test files img existe pas";

    }

    // Modifie le nom et l'emplacement du img
    $infos = pathinfo($_FILES["imglink"]['name']);
    var_dump($infos);
    
    $userPPWhithID = '/img/userPP/' . $_SESSION['id'].'.'. $infos['extension'];
    $cible = $_SERVER['DOCUMENT_ROOT'] . $userPPWhithID;
    move_uploaded_file($_FILES["imglink"]['tmp_name'], $cible);
    
    // Ajouter le imglink dans la BDD
    $controller->addImgLink($userPPWhithID);
    
    header('Location: /profil.php?success=pp');
    exit;
} elseif ($_GET['add'] == 'name'){
    $controller->addUserName($_SESSION['id'],htmlspecialchars($_POST['name']), htmlspecialchars($_POST['firstname']));

    header('Location: /profil.php?success=addName');
    exit;
    

}



?>