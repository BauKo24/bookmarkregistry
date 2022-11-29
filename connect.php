<?php
require 'vendor/autoload.php';

use Bauko\Web\controllers\AppController;
use Bauko\Web\db\Db;

$db = new Db('db', 'campus', 'docker', 'docker');
$controller = new AppController($db);