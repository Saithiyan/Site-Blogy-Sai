<!DOCTYPE html>
<html lang="fr">
<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/src/views/head.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/src/views/navbar.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/src/controllers/PostController.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/src/controllers/CommentaireController.php";
$titre = "Accueil";
?>
<!-- <meta http-equiv="refresh" content="3"> -->

<body>
    <h1>ICI C L'ACCUEIL !</h1>
    <section class='postSection'>
        <?php

        $tabAllPosts = PostController::getAllPostUsers();
        // var_dump($tabAllPosts);
        // var_dump($tabPosts);
        foreach ($tabAllPosts as $post) {


            $postID = $post['id'];
            $userID = $post['userID'];
            $avatar = $post['avatar'];
            $name = $post['name'];
            $firstname = $post['firstname'];

            $titre = $post['titre'];
            $contenu = $post['contenu'];
            $img = $post['img'];
            $date = $post['date'];
            echo "<br><br>";
            echo "
                <div class='postContainer'>
                    <div class='divpost divUser'>
                        <a class='apost' href='/profil.php?id=$userID'><img class='userPP' src='$avatar'></a>
                        <a class='apost' href='/profil.php?id=$userID'><p>$name $firstname</p></a>
                        <p class='postDate'>$date</p>
                    </div>
                   
                    <div class='divpost'>
                        <h4 class='postTitre'>$titre</h4>
                    </div>
                    <div class='divpost'>
                        <p class='postContenu'>$contenu</p>
                        <img class='postImg' src='$img'>
                    </div>
                ";

            if (isset($_SESSION['id'])) {
                $userIDco = $_SESSION['id'];
                $user = UserController::getUserWithEmail($_SESSION['email']);
                // var_dump($user);
                $avatarco = $user['img'];
                $nameco = $user['name'];
                $firstnameco = $user['firstname'];
                echo "
                        <div class='divFormCom postContainer'>
                            <div class='divpost divUser'>
                                <a class='apost' href='/profil.php?id=$userIDco'><img class='userPP' src='$avatarco'></a>
                                <a class='apost' href='/profil.php?id=$userIDco'><p>$nameco $firstnameco</p></a>
                            </div>
                            <form class='formCommentaire' action='/src/views/commentaires/addCommentaire.php?postID=$postID' method='post'>
                                <div class='container'>
                                    <textarea class='textarea inputfile comTextarea' name='commentaire' rows='10' cols='33' placeholder='Votre commmtaire...'></textarea>
                                </div>
                                <button class='btnCommentaire'>Commenter >> </button>
                            </form>

                            
                            <form action='index.php?afficheCom=$postID' method='post'>
                                <button class='btnCommentaire AffichageCom'>Afficher</button>
                            </form>
                        </div>
                        ";
            }
            echo "</div>";

            
            //Affiche uniquement les comentaires du post du butonn selectionné et reinitialise les autres
            if (isset($_GET['afficheCom']) and $_GET['afficheCom'] == $postID) {
                $commentaires = CommentaireController::getCommentairesWithPostID($_SESSION['id'], $postID);
                // var_dump($commentaires);

                foreach ($commentaires as $com) {
                    $userID = $com['userID'];
                    $avatar = $com['avatar'];
                    $name = $com['name'];
                    $firstname = $com['firstname'];
                    $contenuCom = $com['contenuCom'];
                    echo "
                    <div class='divFormCom postContainer'>
                        <div class='divpost divUser'>
                            <a class='apost' href='/profil.php?id=$userID'><img class='userPP' src='$avatar'></a>
                            <a class='apost' href='/profil.php?id=$userID'>
                                <p>$name $firstname</p>
                            </a>
                        </div>
                        <p>$contenuCom</p>
                    </div>
                    ";
                }
            }
        }
        ?>
        
        <!-- <div>
            <div class='divpost divUser'>
                <a class='apost' href='/profil.php?id=$userIDco'><img class='userPP' src='$avatarco'></a>
                <a class='apost' href='/profil.php?id=$userIDco'>
                    <p>$nameco $firstnameco</p>
                </a>
            </div>
            <p>$contenuCom</p>
        </div> -->

        <!-- <div class='container'>
              <input class='input' type='text' name='commentaire' required=''>
              <label class='label'>Commenter...</label>
         </div> -->
    </section>
</body>

</html>