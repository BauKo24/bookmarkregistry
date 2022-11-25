<?php
require_once('connect.php');

if(isset($_GET['id']) && !empty($_GET['id'])){

    $id = strip_tags($_GET['id']);
    
    $db->bookmarks->deleteBookmark($id);

    header('Location: index.php');
}

require_once('close.php');