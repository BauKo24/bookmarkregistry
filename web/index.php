<?php
require_once('connect.php');

// $controller->index();

$router = new AltoRouter();

// map homepage
$router->map( 'GET', '/', function() use ($controller) {
	$controller->index();
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
