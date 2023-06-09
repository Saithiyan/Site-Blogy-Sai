<?php 
include_once $_SERVER['DOCUMENT_ROOT'] . "/src/models/CommentaireModel.php";

class CommentaireController{
    private $model;

    public function __construct($userIDco, $postID, $contenuCom){
        $this->model = new CommentaireModel($userIDco, $postID, $contenuCom);
    }

    public function addCommentaire(){
        return $this->model->addCommentaire();
    }
    
    static public function getCommentairesWithPostID($userIDco, $postID){
        $model = new CommentaireModel($userIDco, $postID);
        return $model->getCommentairesWithPostID();
    }
}
?>