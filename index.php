<?php
// index.php (Main entry point)

require_once 'routes.php';
// Dispatch the request
$uri = $_SERVER['REQUEST_URI'];
$router->dispatch($uri);
