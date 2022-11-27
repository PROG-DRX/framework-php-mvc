<?php 

$routes = [
	'inicio' => 'main@index',
	'loja' => 'main@loja'
];

$action = 'inicio';

if(isset($_GET['a'])){

	if(!key_exists($_GET['a'],$routes)){
		$action = 'inicio';
	} else {
		$action = $_GET['a'];
	}
}

$piece = explode('@', $routes[$action]);
$controller = 'core\\controllers\\'.ucfirst($piece[0]);
$method = $piece[1];


$ctr = new $controller();
$ctr->$method();