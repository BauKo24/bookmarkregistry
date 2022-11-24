<?php

include ("db.php");
class Bookmark{
    private $id;
    private $name;
    private $url;
    private $id_user;
    private $pdo;
    private $all;

    public function __construct(){
    }

    public function getBookmarkById($id){
        $db = new DB();
        $pdo = $db->connect();

        $query = "SELECT * FROM regist_bookmark WHERE id=".$id;
        $stmt = $pdo->query($query);
        $result = $stmt->fetch();

        // var_dump($result);

        // init propriété de la class 
        $this->id = $result['id'];
        $this->name = $result['name'];
        $this->url = $result['url'];
        $this->id_user = $result['id_user'];
    }

    public function getAllBookmarks (){
        $db = new DB();
        $pdo = $db->connect();

        $query = "SELECT * FROM regist_bookmark";
        $stmt = $pdo->query($query);
        $result = $stmt->fetchAll();
        
        $this->all = $result;
    }
}

// $apple = new Bookmark();
// $test = $apple->getBookmarkById(43);
// var_dump($apple);

$pear = new Bookmark();
$test = $pear->getAllBookmarks();
var_dump($pear);