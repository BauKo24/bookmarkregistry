<?php

class Bookmark
{
    private $id;
    private $name;
    private $url;
    private $id_user;

    public function __construct()
    {
        
    }

    public function getById($id)
    {
        $db = new db();
        $pdo = $db->connect();
        $query = "SELECT * FROM regist_bookmark WHERE id=".$id;
        $stmt = $pdo->query($query);
        $result = $stmt->fetch();
        return $result;

    }
}