<?php
// index.php (Main entry point)

require_once 'routes.php';
// Dispatch the request
$uri = $_SERVER['REQUEST_URI'];
$controller = $router->dispatch($uri);

// Render the layout and pass the view content returned by the controller
$router->renderLayout($controller);
