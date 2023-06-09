<?php 
include_once $_SERVER['DOCUMENT_ROOT'] . "/src/models/UserModel.php";

class UserController{
    private $model;

    public function __construct($email)
    {
        $this->model = new UserModel($email);
    }

    public function isExistDB(){
        return $this->model->getId() != null;
    }
    public function signupUser($password){
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        return $this->model->signupUser($hashedPassword);
    }
    public function isPasswordCorrect($password){
        return password_verify($password, $this->model->getHashedPassword());
    }
    public function addImgLink($imglink){
        return $this->model->addImgLink($imglink);
    }
    public function addUserName($id, $name, $firstname){
        return $this->model->addUserName($id, $name, $firstname);
    }

    static public function getUserImgWithEmail($email){
        $model = new UserModel($email);
        return $model->getUserImgWithEmail();
    }
    static public function getUserWithEmail($email){
        $model = new UserModel($email);
        return $model->getUserWithEmail();
    }

    //Getters
    public function getId(){
        return $this->model->getId();
    }
    public function getEmail(){
        return $this->model->getEmail();
    }
}

?>