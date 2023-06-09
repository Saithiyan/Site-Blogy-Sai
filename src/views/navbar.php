<?php
session_start();
// var_dump($_SESSION);

include_once $_SERVER['DOCUMENT_ROOT'] . "/src/views/head.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/src/controllers/UserController.php";
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- <meta http-equiv="refresh" content="3"> -->

</head>

<body>
    <nav>
        <div class="divul">
            <svg class="iconburger" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 50 50" width="30px" height="30px" fill="white">
                <path d="M 0 7.5 L 0 12.5 L 50 12.5 L 50 7.5 Z M 0 22.5 L 0 27.5 L 50 27.5 L 50 22.5 Z M 0 37.5 L 0 42.5 L 50 42.5 L 50 37.5 Z" />
            </svg>

            <ul class="ul">
                <a href="/index.php">
                    <li>Accueil</li>
                </a>
                <?php
                if (isset($_SESSION['id'])) {
                    $id=$_SESSION['id'];
                    echo "
                        <a href='/profil.php?id=$id'>
                        <li>Profil</li>
                        </a>
                        <a href='/settings.php'>
                        <li>Paramètre</li>
                        </a>
                        <a href='/src/views/users/logout.php'>
                        <li>Deconnexion</li>
                        </a>
                        
                        ";
                } else {
                    echo "
                        <a href='/connexion.php'>
                        <li>Connexion</li>
                        </a>
                        
                        ";
                }
                ?>
            </ul>
        </div>
        <div>
            <?php
                if(isset($_SESSION['id'])){
                    // $user = UserController::getUserWithUserId($_SESSION['email']);
                    $user = UserController::getUserImgWithEmail($_SESSION['email']);
                    // var_dump($user);
                    $img = $user['img'];
                    echo "
                    <a href='/profil.php'><img class='imgPP' src='$img'></a>
                    ";
                }
            ?>
            
        </div>
        <a href="">
            <p>LOGO</p>
        </a>
        
    </nav>
</body>

</html>