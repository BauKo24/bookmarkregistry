<?php
try{
    $db = new PDO('mysql:host=localhost;dbname=brief4_db', 'root','');
    $db->exec('SET NAMES "UTF8"');
} catch (PDOException $e){
    echo 'Erreur : '. $e->getMessage();
    die();
}