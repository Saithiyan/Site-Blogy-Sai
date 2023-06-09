<!DOCTYPE html>
<html lang="fr">
<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/src/views/head.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/src/views/navbar.php";
$titre = "Authentification";
if(isset($_SESSION['id'])){
    header('Location: /index.php');
    exit;
}
?>
<body>


    <section>
        <!-- Switch toggle for flip -->
        <div class="container-switch">
            <div class="switch-toggle">
                <input type="checkbox" id="flip">
                <label for="flip"></label>
            </div>
        </div>

        <!-- flip card for auth -->
        <div class="flip-card">
            <div class="flip-card-inner">

                <div class="flip-card-front">
                    <section>
                        <h3>S'inscrire</h3>
                        <form class="form" action="/src/views/users/signin.php" method="post">
                            <div class="container">
                                <input class="input" type="email" name="email" required="">
                                <label class="label">Identifant</label>

                            </div>
                            <div class="container">
                                <input class="input" type="text" name="password" required="">
                                <label class="label">Mot de Passe</label>
                            </div>
                            <div class="container">
                                <input class="input" type="text" name="confpassword" required="">
                                <label class="label">Confirmez le Mot de Passe</label>
                            </div>

                            <?php
                            if (isset($_GET['error']) and $_GET['error'] == "identifiant") {
                                echo "
                                    <p class='pError'>Veuillez entrer un Identifiant mail !</p>
                                    ";
                            } elseif (isset($_GET['error']) and $_GET['error'] == "password") {
                                echo "
                                    <p class='pError'>Veuillez entrer un Mot de passe !</p>
                                    ";
                            } elseif (isset($_GET['error']) and $_GET['error'] == "confpassword") {
                                echo "
                                    <p class='pError'>Veuillez confirmez votree Mot de passe !</p>
                                    ";
                            } elseif (isset($_GET['error']) and $_GET['error'] == "PWdifferent") {
                                echo "
                                    <p class='pError'>Mot de passe different !</p>
                                    ";
                            } elseif (isset($_GET['error']) and $_GET['error'] == "notRegistered") {
                                echo "
                                    <p class='pWarning'>Vous n'êtes pas encore inscrit, Inscrivez-vous !</p>
                                    ";
                            }

                            ?>
                            <button data-text="Awesome" class="button">
                                <span class="actual-text">&nbsp;S'inscrire&nbsp;</span>
                                <span class="hover-text" aria-hidden="true">&nbsp;S'inscrire&nbsp;</span>
                            </button>
                        </form>
                    </section>
                </div>

                <div class="flip-card-back">
                    <section>
                        <h3>Se Connecter</h3>
                        <form class="form" action="/src/views/users/login.php" method="post">
                            <div class="container">
                                <input class="input" type="text" name="email">
                                <label class="label">Identifant</label>
                            </div>
                            <div class="container">
                                <input class="input" type="text" name="password">
                                <label class="label">Mot de Passe</label>
                            </div>

                            <?php

                            if (isset($_GET['warning']) and $_GET['warning'] == "alreadyRegistered") {
                                echo "
                                <p class='pjs pWarning'>Vous déjà inscrit, Connectez-vous !</p>
                                ";
                            } elseif (isset($_GET['success']) and $_GET['success'] == "registered") {
                                echo "
                                <p class='pjs pSuccess'>Inscripton réussi, Connectez-vous !</p>
                                ";

                            } elseif (isset($_GET['error']) and $_GET['error'] == "IDPW") {
                                echo "
                                <p class='pjs pError'>Veuillez entrer un Identifiant et un Mot de passe !</p>
                                ";
                            }
                             elseif (isset($_GET['error']) and $_GET['error'] == "incorrect") {
                                echo "
                                <p class='pjs pError'>Identifiant ou Mot de passe Incorrect !</p>
                                ";
                            } 
                            ?>

                            <button data-text="Awesome" class="button">
                                <span class="actual-text">&nbsp;Se Connecter&nbsp;</span>
                                <span class="hover-text" aria-hidden="true">&nbsp;Se&nbsp;Connecter&nbsp;</span>
                            </button>
                        </form>
                    </section>
                </div>
            </div>
        </div>
    </section>


</body>

</html>