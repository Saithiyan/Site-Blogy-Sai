<?php 
include_once $_SERVER['DOCUMENT_ROOT'] . "/src/models/PostModel.php";

class PostController{
    private $model;

    public function __construct($userID, $contenu = null , $titre= null , $img = null)
    {
        $this->model = new PostModel($userID, $contenu, $titre, $img);
    }
    public function addPost(){
        return $this->model->addPost();
    }
    public function deletePostWhithId($postID){
        return $this->model->deletePostWhithId($postID);
    }

    static public function getUserPostsWithUserID($userID){
        $model = new PostModel($userID);
        return $model->getUserPostsWithUserID();
    }
    static public function getAllPostUsers(){
        $model = new PostModel();
        return $model->getAllPostUsers();
    }
}

?>