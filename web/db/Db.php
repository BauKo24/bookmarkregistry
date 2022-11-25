<?php

require_once(__DIR__ . '/../models/bookmarks.php');
require_once(__DIR__ . '/../models/categories.php');
require_once(__DIR__ . '/../models/users.php');

class Db
{
    private $host;
    private $dbName;
    private $username;
    private $password;

    public $con;

    //model definitions
    public $bookmarks;
    public $categories;
    public $users;

    public function __construct($host, $dbName, $username, $password)
    {
        $this->host = $host;
        $this->dbName = $dbName;
        $this->username = $username;
        $this->password = $password;

        $this->connect();

        //model loaders
        $this->loadModels();
    }

    private function connect()
    {
        try {
            $this->con = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->dbName, $this->username, $this->password);
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage() . "<br/>";
            die();
        }
    }

    private function loadModels()
    {
        $this->bookmarks = new Bookmarks($this->con);
        $this->categories = new Categories($this->con);
        $this->users = new Users($this->con);
    }
}