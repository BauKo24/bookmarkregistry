<?php

namespace Bauko\Web\models;
class Bookmarks
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function deleteBookmark($id)
    {
        $sql = "DELETE FROM `regist_bookmark` WHERE `id`=:id;";

        $query = $this->db->prepare($sql);

        $query->bindValue(':id', $id, \PDO::PARAM_INT);
        $query->execute();
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
        return  $query->fetchAll(\PDO::FETCH_ASSOC);
    }
    
    public function getBookmarkById($id)
    {
        $sql = "SELECT * FROM `regist_bookmark` WHERE `id`=:id;";

        $query = $this->db->prepare($sql);

        $query->bindValue(':id', $id, \PDO::PARAM_INT);
        $query->execute();

        return $query->fetch();
    }

    

    public function editBookmarkById($nom, $adresse, $idu,$id)
    {
        $sql = "UPDATE `regist_bookmark` SET `name`=:name, `url`=:url, `id_user`=:id_user WHERE `id`=:id;";

        $query = $this->db->prepare($sql);

        $query->bindValue(':name', $nom, \PDO::PARAM_STR);
        $query->bindValue(':url', $adresse, \PDO::PARAM_STR);
        $query->bindValue(':id_user', $idu, \PDO::PARAM_INT);
        $query->bindValue(':id', $id, \PDO::PARAM_INT);
        
        $query->execute();
    }

    public function createBookmark($nom, $adresse, $idu)
    {
        $sql = "INSERT INTO `regist_bookmark` (`name`, `url`, `id_user`) VALUES (:name, :url, :id_user);";

        $query = $this->db->prepare($sql);

        $query->bindValue(':name', $nom, \PDO::PARAM_STR);
        $query->bindValue(':url', $adresse, \PDO::PARAM_STR);
        $query->bindValue(':id_user', $idu, \PDO::PARAM_INT);

        $query->execute();
    }
}