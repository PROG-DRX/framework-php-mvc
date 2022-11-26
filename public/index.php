<?php 

use core\classes\Database;

session_start();

require_once('../config.php');
require_once('../vendor/autoload.php');


$bd = new Database();
$clientes = $bd->update("SELECT* FROM clientes");
echo '<prev';
print_r($clientes);