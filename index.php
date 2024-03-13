<?php
$route = $_GET['route'];
require_once 'config/data_base.php';
require_once 'core/function_db.php';
require_once 'core/function.php';

$route = explodeUrl($route);

$conn = connect();

switch ($route) {
    case ($route[0] == ''):
        require_once 'template/main.php';
        break;

    case ($route[0] == 'article' && isset($route[1])):
        require_once 'template/article.php';
        break;

    case ($route[0] == 'cat' && isset($route[1])):
        require_once 'template/category.php';
        break;

    case ($route[0] == 'registration'):
        require_once 'template/registration.php';
        break;

    case ($route[0] == 'login'):
        require_once 'template/login.php';
        break;

    case ($route[0] == 'admin' AND $route[1] === 'delete' AND isset($route[2])):
        if (!getUser()) {
            header('Location: /');
            exit();
        }

        $query = "DELETE FROM `info` WHERE id=" . $route[2];
        execQuery($query);
        header('Location: /admin');
        break;

    case ($route[0] == 'admin'):
        require_once 'template/admin.php';
        break;
    
    default:
        require_once 'template/404.php';
        break;
}
?>