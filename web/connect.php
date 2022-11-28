<?php

require_once 'db/Db.php';
require_once 'controllers/appController.php';

$db = new Db('localhost', 'brief4_db', 'root', '');
$controller = new AppController($db);