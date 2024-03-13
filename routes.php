<?php
require_once 'core/Router.php';
require_once 'core/Locale.php';
$dbConfig = require_once 'config.php';
// Create the Router instance
if ($dbConfig['db_in_use'] == true) {
    $router = new Router($dbConfig);
} else {
    $router = new Router();
}

// Define routes (You should customize these based on your application needs)
$router->addRoute('/', 'HomeController@index');
$router->addRoute('/admin', 'AdminController@index', ['AuthMiddleware']);
$router->addRoute('/admin/login', 'AdminController@login');
