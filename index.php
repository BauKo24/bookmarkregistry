<?php
require_once('connect.php');

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

// match current request url
$match = $router->match();

// call closure or throw 404 status
if( is_array($match) && is_callable( $match['target'] ) ) {
	call_user_func_array( $match['target'], $match['params'] ); 
} else {
	// no route was matched
	header( $_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found');
}
