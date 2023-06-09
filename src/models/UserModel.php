<?php 
include_once $_SERVER['DOCUMENT_ROOT'] . "/src/DB.php";

class UserModel{
    private $id = null;
    private $email;
    private $hashedPassword = null;

    private $db;

    public function __construct($email)
    {
        $this->email = $email;
        $this->db = (new DB())->getDB();

        $user = $this->isExistDB();
        // var_dump($user);
        if($user){
            $this->id = $user['id'];
            $this->hashedPassword = $user['password'];
        }
    }

    public function isExistDB(){
        $prepare = $this->db->prepare('SELECT * FROM users WHERE email=?');
        $prepare->execute([$this->email]);
        return $prepare->fetch();
    }
    public function signupUser($password){
        $prepare = $this->db->prepare('INSERT INTO users (email, password) VALUES (?, ?)');
        $prepare->execute([$this->email, $password]);
    }
    public function addImgLink($imglink){
        $prepare = $this->db->prepare('UPDATE users SET img=? WHERE id=?');
        $prepare->execute([$imglink, $this->id]);
    }
    public function addUserName($id, $name, $firstname){
        $prepare = $this->db->prepare('UPDATE users SET name=?, firstname=? WHERE id=?');
        $prepare->execute([$name, $firstname, $id]);
    }



    public function getUserImgWithEmail(){
        $prepare = $this->db->prepare('SELECT img FROM users WHERE email=?');
        $prepare->execute([$this->email]);
        return $prepare->fetch();
    }
    public function getUserWithEmail(){
        $prepare = $this->db->prepare('SELECT name,firstname, img FROM users WHERE email = ?');
        $prepare->execute([$this->email]);
        return $prepare->fetch();
    }

    //Getters:
    public function getId(){
        return $this->id;
    }
    public function getEmail(){
        return $this->email;
    }
    public function getHashedPassword(){
        return $this->hashedPassword;
    }
}

?>