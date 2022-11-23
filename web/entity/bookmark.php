<?php

class Bookmark{
    private $id;
    private $name;
    private $url;
    private $id_user;
    private $pdo;

    public function __construct()
    {
        
    }

    public function getBookmarkById()
    {
        $user = "root";
        $password = "";
        $host = "localhost";
        $dbname = "brief4_db";
        $pdo = new PDO('mysql:host=localhost;dbname=brief4_db', 'root','');

        $query = "SELECT * FROM regist_bookmark WHERE id=";
        $stmt = $pdo->query($query);
        $result = $stmt->fetchAll();

        // init propriété de la class 
        $this->id = $result['id'];
        $this->name = $result['name'];
        $this->url = $result['url'];
        $this->id_user = $result['id_user'];
    }
}

$apple = new Bookmark();
var_dump($apple);