<?php
// index.php (Main entry point)

// Uncomment the code below if database connection is required!
// require_once 'core/Database.php';
// $dbConfig = require_once 'config.php';
// $pdo = Database::connect($dbConfig);

require_once 'routes.php';

// Dispatch the request
$uri = $_SERVER['REQUEST_URI'];
$router->dispatch($uri);
