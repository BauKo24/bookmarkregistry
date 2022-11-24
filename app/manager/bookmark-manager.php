<?php

namespace app\manager;

use PDO;
use app\entity\bookmark;

class BookmarkManager
{

    private $pdo;
    private $pdoStatement;

    public function __construct()
    {
        $this->pdoStatement = $this->pdo->prepare('mysql:host=localhost;dbname=brief4_db', 'root','');
    }

    public function create(Bookmark &$bookmark)
    {
        $this->pdoStatement = $this->pdo->prepare('INSERT INTO regist_bookmark VALURES (NULL, :name, :url, :id_user)');

        $this->pdoStatement->BindValue(':name', $bookmark->getName(), PDO::PARAM_STR);
        $this->pdoStatement->BindValue(':url', $bookmark->getUrl(), PDO::PARAM_STR);
        $this->pdoStatement->BindValue(':id_user', $bookmark->getIDU(), PDO::PARAM_INT);
        
        $executeIsOk = $this->pdoStatement->execute();

        if(!$executeIsOk){
            return false;
        }

        else{
            $id = $this->pdo->lastInsertId();
            $bookmark = $this->read($id);

            return true;
        }
    }

    public function read($id)
    {
        $this->pdo->prepare('SELECT * FROM regist_bookmark WHERE id = :id');

        $this->pdoStatement->BindValue(':id', $id, PDO::PARAM_INT);

        $executeIsOk = $this->pdoStatement->execute();

        if($executeIsOk){
            $bookmark = $this->pdoStatement->fetchObject('app\entity\bookmark');

            if($bookmark === false){
                return null;
            }

            else{
                return $bookmark;
            }

        }else{
            return false;
        }
    }

    public function readAll()
    {
        $this->pdoStatement = $this->pdo->query('SELECT * FROM regist_bookmark ORDER BY name, url, id-user');

        $regist_bookmark = [];

        while($bookmark = $this->pdoStatement->fetchObject('app\enity\bookmark')){
            $regist_bookmark[] = $bookmark;
        }

        return $bookmark;
    }

    public function update(Bookmark $bookmark)
    {

    }

    public function delete(Bookmark $bookmark)
    {

    }

}