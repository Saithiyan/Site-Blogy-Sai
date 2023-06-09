<?php 
include_once $_SERVER['DOCUMENT_ROOT'] . "/src/DB.php";

class CommentaireModel{
    private $userIDco;
    private $postID;
    private $contenuCom;

    private $db;

    public function __construct($userIDco, $postID, $contenuCom = null){
        $this->userIDco = $userIDco;
        $this->postID = $postID;
        $this->contenuCom = $contenuCom;

        $this->db = (new DB())->getDB();
    }

    public function addCommentaire(){
        $prepare = $this->db->prepare('INSERT INTO commentaires (userID, postID, contenuCom) VALUES (?,?,?)');
        $prepare->execute([$this->userIDco,$this->postID,$this->contenuCom]);
    }

    public function getCommentairesWithPostID(){
        // $prepare = $this->db->prepare('SELECT * FROM commentaires WHERE postID=?');
        $prepare = $this->db->prepare('SELECT commentaires.*, name, firstname, email, users.img AS avatar FROM commentaires JOIN users WHERE commentaires.userID = users.id AND postID=?');
        $prepare->execute([$this->postID]);
        return $prepare->fetchAll(PDO::FETCH_ASSOC);
    }
    // ('SELECT posts.*, name, firstname, email, users.img AS avatar FROM posts JOIN users ON posts.userID = users.id');
}

?>