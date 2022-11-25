<?php

include('db/db.php');
include('entity/bookmark.php');

$truc = new Bookmark();
$test = $truc->getById(22);
var_dump($test);