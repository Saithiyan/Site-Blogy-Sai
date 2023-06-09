<?php 
class DB{
    private $db;
    public function __construct()
    {
        $dns = "mysql:dbname=blogy;host=localhost";
        $username = "root";
        $password = "";
        $this ->db = new PDO($dns,$username, $password);
    }
    // Getters
    public function getDB(){
        return $this->db;
    }
}

?> 