<?php
require 'vendor/autoload.php';

use Bauko\Web\controllers\AppController;
use Bauko\Web\db\Db;

$db = new Db(getenv('MYSQL_HOST'), getenv('MYSQL_DB'), getenv('MYSQL_USER'), getenv('MYSQL_PASSWORD'));
$controller = new AppController($db);

$router = new AltoRouter();

// map homepage
$router->map( 'GET', '/', function() use ($controller) {
	$controller->index();
});

$router->map('GET', '/delete/[i:id]', function ($id) use ($controller) {
    $controller->delete($id);
});

$router->map('GET', '/update/[i:id]', function ($id) use ($controller) {
    $controller->read_update($id);
});

$router->map('POST', '/updatetable', function () use ($controller) {
    $controller->update();
});

$router->map('GET|POST', '/create', function () use ($controller) {
    $controller->create();
});

// match current request url
$match = $router->match();

// call closure or throw 404 status
if( is_array($match) && is_callable( $match['target'] ) ) {
	call_user_func_array( $match['target'], $match['params'] ); 
} else {
	// no route was matched
	header( $_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found');
}
