<!DOCTYPE html>
<html lang="fr">
<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/src/views/head.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/src/views/navbar.php";
$titre = "Parametre Utilisateur";
if (!isset($_SESSION['id'])) {
    header('Location: /index.php');
    exit;
}
?>

<body>
    <form action="/src/views/users/userSettings.php?add=userPP" method="post" enctype="multipart/form-data">
        <a class="aSettings" href="">
            <p>Ajouter ou Modifier le Photo de Profil</p>
        </a>

        <label for="imglink">Choisir le Photo de Profil</label>
        <input type="file" name="imglink" class="inputFile" required="">
        <button class="btn">Valider</button>
    </form>
    <form class="formAddName" action="/src/views/users/userSettings.php?add=name" method="post">
        <div class="container">
            <input class="input" type="text" name="name" required="">
            <label class="label">Ajouter votre nom</label>
        </div>
        <div class="container">
            <input class="input" type="text" name="firstname" required="">
            <label class="label">Ajouter votre prenom</label>
        </div>
        <button data-text="Awesome" class="button">
            <span class="actual-text">&nbsp;Ajouter&nbsp;</span>
            <span class="hover-text" aria-hidden="true">&nbsp;Ajouter&nbsp;</span>
        </button>
    </form>
</body>

</html>