<?php
require_once 'core/Router.php';
// Create the Router instance
$router = new Router();

// Define routes (You should customize these based on your application needs)
$router->addRoute('/', 'HomeController@index');
$router->addRoute('/admin', 'AdminController@index', ['AuthMiddleware']);
$router->addRoute('/admin/login', 'AdminController@login');
