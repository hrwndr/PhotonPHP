<?php
// core/Router.php
require_once 'Database.php';

class Router
{
    protected $routes = [];
    protected $db;

    public function __construct($dbConfig = [])
    {
        if (count($dbConfig) > 0) {
            $this->db = new Database($dbConfig);
        }
    }

    public function addRoute($uri, $controller, $middleware = [])
    {
        $this->routes[$uri] = [
            'controller' => $controller,
            'middleware' => $middleware,
        ];
    }

    public function dispatch($uri)
    {
        $uri = explode('?', $uri)[0] ?? $uri;
        if (array_key_exists($uri, $this->routes)) {
            $route = $this->routes[$uri];

            // Execute middleware before the controller action
            $this->beforeMiddleware($route['middleware']);

            // Call the controller action
            $this->callAction($route['controller']);
        } else {
            // Handle 404 Not Found
            http_response_code(404);
            echo "404 Not Found";
        }
    }

    protected function callAction($controller)
    {
        list($controllerName, $action) = explode('@', $controller);

        require_once "app/controllers/{$controllerName}.php";

        $controllerInstance = new $controllerName($this->db);

        $controllerInstance->$action();
    }

    // Middleware method: Execute middleware before the controller action
    protected function beforeMiddleware($middleware)
    {
        foreach ($middleware as $middlewareName) {
            $middlewarePath = "app/middleware/{$middlewareName}.php";

            if (file_exists($middlewarePath)) {
                require_once $middlewarePath;

                // Create an instance of the middleware and call its handle method
                $middlewareClass = new $middlewareName();
                $middlewareClass->handle();
            } else {
                echo "Middleware not found: {$middlewareName}<br>";
            }
        }
    }
}
