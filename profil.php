<!DOCTYPE html>
<html lang="fr">
<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/src/views/head.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/src/views/navbar.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/src/controllers/PostController.php";
$titre = "Profil";
// if(!isset($_SESSION['id'])){
//     header('Location: /index.php');
//     exit;
// }
?>
<body>
    <?php 
    // quand le profil.php n'a pas de getid alors afficher le form
    // si le profil.php a un getid alors verifier le get a sessionid si vrai afficher le form 
    if(isset($_GET['id']) and $_GET['id'] == $_SESSION['id']){
        echo "
            <section>
                <form class='formPost' action='/src/views/posts/addPost.php' method='POST' enctype='multipart/form-data'>
                    <h3>Ecrire un Post</h3>
        
                    <div class='container'>
                        <input class='input' type='text' name='titre' required=''>
                        <label class='label'>Titre</label>
                    </div>
        
                    <div class='container'>
                        <textarea class='textarea inputfile' name='contenu' rows='10' cols='33' placeholder='Votre commmtaire...' required=''></textarea>
                    </div>
        
            ";       
                    if (isset($_GET['error']) and $_GET['error'] == 'nocontenu') {
                        echo "
                        <p class='pError'>Le contenu ne peut-être vide !</p>
                        ";
                    }
                
        echo "
                    <label for='file'>Importer une imgage</label>
                    <input class='inputfile' type='file' name='img'>
        
        
                    <button data-text='Awesome' class='button'>
                        <span class='actual-text'>&nbsp;Upload&nbsp;</span>
                        <span class='hover-text' aria-hidden='true'>&nbsp;Upload&nbsp;</span>
                    </button>
                </form>
            </section>
            ";
    }
    ?>

    <section class="postSection">
        <h3>Mes Posts :</h3>
        <?php

        $userID = (isset($_GET['id']))? $_GET['id']: $_SESSION['id'];
        
        $tabPosts = PostController::getUserPostsWithUserID($userID);
        // var_dump($tabPosts);
        foreach ($tabPosts as $post) {
            $id = $post['id'];
            $titre = $post['titre'];
            $contenu = $post['contenu'];
            $img = $post['img'];
            $date = $post['date'];

            echo "
                <div class='postContainer'>
                    <div class='divpost'>
                        <h4 class='postTitre'>$titre</h4>
                        <p class='postDate'>$date</p>
                        <a href='/src/views/posts/deletePost.php?id=$id'><img class='deleteButton' src='/img/icons8-delete.svg'></a>
                    </div>
                    <div class='divpost'>
                    <p class='postContenu'>$contenu</p>
                        <img class='postImg' src='$img'>
                    </div>
                </div>
                        ";
        }
        ?>
       
    </section>


</body>

</html>