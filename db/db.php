<?php
class db {
    private $host = "localhost";
    private $dbname = "brief4_db";
    private $user = "root";
    private $password = "";

    public function connect()
    {
        $pdo = new PDO('mysql:host='.$this->host.';dbname='.$this->dbname, $this->user, $this->password);
        return $pdo;
    }
}
?>