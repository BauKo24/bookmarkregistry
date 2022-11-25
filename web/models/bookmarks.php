<?php

class Bookmarks
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function getBookmarks()
    {
        // J'écris la requête
        $sql = "SELECT * FROM regist_bookmark";

        // Je prépare la requête
        $query = $this->db->prepare($sql);

        //J'exécute la requête
        $query->execute();

        // Je stocke le résultat dans un tableau assiociatif
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
}