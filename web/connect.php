<?php
require 'vendor/autoload.php';

use Bauko\Web\controllers\AppController;
use Bauko\Web\db\Db;

$db = new Db('localhost', 'brief4_db', 'root', '');
$controller = new AppController($db);