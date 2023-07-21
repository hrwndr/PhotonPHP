<?php
// core/Router.php

class Router
{
    protected $routes = [];

    public function addRoute($uri, $controller)
    {
        $this->routes[$uri] = $controller;
    }

    public function dispatch($uri)
    {
        if (array_key_exists($uri, $this->routes)) {
            $controller = $this->routes[$uri];
            $this->callAction($controller);
        } else {
            // Handle 404 Not Found
            echo "404 Not Found";
        }
    }

    protected function callAction($controller)
    {
        list($controllerName, $action) = explode('@', $controller);

        require_once "app/controllers/{$controllerName}.php";

        $controllerInstance = new $controllerName;

        $controllerInstance->$action();
    }
}
