<?php 
include_once $_SERVER['DOCUMENT_ROOT'] . "/src/DB.php";

class PostModel{
    private $userID;
    private $titre;
    private $contenu;
    private $img;

    private $db;

    public function __construct($userID = null, $contenu  = null, $titre = null, $img = null)
    {
        $this->userID = $userID;
        $this->titre = $titre;
        $this->contenu = $contenu;
        $this->img = $img;

        $this->db = (new DB())->getDB();
    }
    public function addPost(){
        $prepare = $this->db->prepare('INSERT INTO posts (userID, titre, contenu, img) VALUES (?,?,?,?)');
        $prepare->execute([$this->userID, $this->titre, $this->contenu, $this->img]);
        // return $prepare->fetch();
    }
    public function deletePostWhithId($postID){
        $prepare = $this->db->prepare('DELETE FROM posts WHERE id=?');
        $prepare->execute([$postID]);
    }


    public function getUserPostsWithUserID(){
        $prepare = $this->db->prepare('SELECT * FROM posts WHERE userID=?');
        $prepare->execute([$this->userID]);
        return $prepare->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getAllPostUsers(){
        $prepare = $this->db->prepare('SELECT posts.*, name, firstname, email, users.img AS avatar FROM posts JOIN users ON posts.userID = users.id');
        $prepare->execute();
        return $prepare->fetchAll(PDO::FETCH_ASSOC);
    }

}
?>