<?php

namespace core;

use core\View;

class Router
{
    protected $routes = [];
    protected $params = [];

    public function __construct() 
    {
        $routes = require 'configs/routes.php';

        foreach ($routes as $key => $value) 
        {
            $this->add($key, $value);
        }
    }

    // This method adds and modifies the route
    public function add($route, $params) 
    {
        $route = preg_replace('/{([a-z]+):([^\}]+)}/', '(?P<\1>\2)', $route);
        $route = '#^'.$route.'$#';
        $this->routes[$route] = $params;
    }

    // This method matches routes to the request
    public function match()
    {
        $request = trim($_SERVER['REQUEST_URI'], '/');

        foreach ($this->routes as $route => $params) 
        {
            if (preg_match($route, $request, $matches)) 
            {
                foreach ($matches as $key => $match) 
                {
                    if (is_string($key)) 
                    {
                        if (is_numeric($match)) 
                        {
                            $match = (int) $match;
                        }

                        $params[$key] = $match;
                    }
                }
                
                $this->params = $params;
                return true;
            }
        }

        return false;
    }

    public function run()
    {
        if ($this->match()) 
        {
            $controllerClass = 'controllers\\'.ucfirst($this->params['controller_id']);

            if (class_exists($controllerClass))
            {
                $action = $this->params['action_id'];

                if (method_exists($controllerClass, $action)) 
                {
                    $controller = new $controllerClass($this->params);
                    $controller->$action();
                } 
                else 
                {
                    View::error(404);
                }
            }
            else
            {
                View::error(404);
            }
        } 
        else 
        {
            View::error(404);
        }
    }
}