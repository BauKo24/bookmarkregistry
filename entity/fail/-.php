<?php

class Bookmark{
    private $id;
    private $name;
    private $url;
    private $id_user;
    private $pdo;

    public function __construct($name, $url, $id_user)
    {
        $this->name = $name;
        $this->url = $url;
        $this->id_user = $id_user;
    }

    public function getBookmarkById($id)
    {
        $user = "root";
        $password = "";
        $host = "localhost";
        $dbname = "brief4_db";
        $pdo = new PDO('mysql:host=localhost;dbname=brief4_db', 'root','');

        $query = "SELECT * FROM regist_bookmark WHERE id=".$id;
        $stmt = $pdo->query($query);
        $result = $stmt->fetch();


        // init propriété de la class 
        $this->id = $result['id'];
        $this->name = $result['name'];
        $this->url = $result['url'];
        $this->id_user = $result['id_user'];
    }
}

$apple = new Bookmark("Youtube", "url-de-youtube.com", 6);
var_dump($apple);