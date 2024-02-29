<?php
$route = $_GET['route'];
require_once 'config/data_base.php';
require_once 'core/function_db.php';
require_once 'core/function.php';

$conn = connect();

switch ($route) {
    case NULL:
        require_once 'template/main.php';
        break;
    
    default:
        # code...
        break;
}