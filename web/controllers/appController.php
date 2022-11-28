<?php

require_once('connect.php');

class AppController
{

    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    private function render($template, $params)
    {
        extract($params);
        include(__DIR__ . '/../views/' . $template . '.php');
    }

    public function index()
    {
        $result = $this->db->bookmarks->getBookmarks();
        $this->render('home', ['result' => $result]);
    }

    public function delete()
    {
        if(isset($_GET['id']) && !empty($_GET['id']))
        {

            $id = strip_tags($_GET['id']);
            $this->db->bookmarks->deleteBookmark($id);
            header('Location: index.php');
        }

    }

    public function create()
    {
        if (isset($_POST)) {
            if (
                isset($_POST['nom']) && !empty($_POST['nom'])
                && isset($_POST['adresse']) && !empty($_POST['adresse'])
                && isset($_POST['idu']) && !empty($_POST['idu'])
            ) {
                $nom = strip_tags($_POST['nom']);
                $adresse = strip_tags($_POST['adresse']);
                $idu = strip_tags($_POST['idu']);
        
                $this->db->bookmarks->createBookmark($nom, $adresse, $idu);
        
                $_SESSION['message'] = "Bookmark ajouté avec succès !";
                header('Location: index.php');
            }
        }

        $this->render('create', []);
    }

    public function update()
    {
        if (isset($_POST)) {
            if (
                isset($_POST['id']) && !empty($_POST['id'])
                && isset($_POST['nom']) && !empty($_POST['nom'])
                && isset($_POST['adresse']) && !empty($_POST['adresse'])
                && isset($_POST['idu']) && !empty($_POST['idu'])
            ) {
                $id = strip_tags($_GET['id']);
                $nom = strip_tags($_POST['nom']);
                $adresse = strip_tags($_POST['adresse']);
                $idu = strip_tags($_POST['idu']);
        
                $this->db->bookmarks->editBookmarkById($id, $nom, $adresse, $idu);
        
                header('Location: index.php');
            }
        }
        
        $id = strip_tags($_GET['id']);
        $result = $this->db->bookmarks->getBookmarkById($id);

        $this->render('update', [
            'result'=> $result
        ]);
    }

}