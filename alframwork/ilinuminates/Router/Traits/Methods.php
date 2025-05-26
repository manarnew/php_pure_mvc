<?php

namespace Ilinuminates\Router\Traits;

trait Methods
{
    /**
     * Add a GET route to the router.
     *
     * @param string $route.
     * @param mixed $controller
     * @param string $action
     * @param array $middlewares
     */
    public static function get(string $route, $controller, $action = null, array $middlewares = [])
    {
        parent::add('GET', $route, $controller, $action,  $middlewares);
    }

    /**
     * @param string $route
     * @param mixed $controller
     * @param mixed $action
     * @param array $middlewares
     * 
     * @return void
     */
    public static function post(string $route, $controller, $action, array $middlewares = [])
    {
        parent::add('POST', $route, $controller, $action,  $middlewares);
    }

    /**
     * @param string $route
     * @param mixed $controller
     * @param mixed $action
     * @param array $middlewares
     * 
     * @return void
     */
    public static function put(string $route, $controller, $action, array $middlewares = [])
    {
        parent::add('PUT', $route, $controller, $action,  $middlewares);
    }

    /**
     * @param string $route
     * @param mixed $controller
     * @param mixed $action
     * @param array $middlewares
     * 
     * @return void
     */
    public static function patch(string $route, $controller, $action, array $middlewares = [])
    {
        parent::add('PATCH', $route, $controller, $action,  $middlewares);
    }

    /**
     * @param string $route
     * @param mixed $controller
     * @param mixed $action
     * @param array $middlewares
     * 
     * @return void
     */
    public static function delet(string $route, $controller, $action, array $middlewares = [])
    {
        parent::add('DELETE', $route, $controller, $action,  $middlewares);
    }
}
