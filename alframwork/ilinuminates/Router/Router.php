<?php

namespace Ilinuminates\Router;

class Router
{
  protected static $routes = [
    'GET' => [],
    'POST' => [],
    'PUT' => [],
    'PATCH' => [],
    'DELETE' => [],
  ];

  private static $public;

  public static function public_path($bind = null)
  {
    static::$public = $bind ?? '/public';
    return static::$public;
  }
  public static function add(string $method, string $route, $controller, $action, array $middlewares = [])
  {
    $route = ltrim($route, '/');
    self::$routes[$method][$route] = compact('controller', 'action', 'middlewares');
  }

  public function routes()
  {
    return static::$routes;
  }

  public static function dispatch($uri, $method)
  {
    $uri = ltrim($uri, '/' . static::public_path() . '/');
    foreach (static::$routes[$method] as $key => $val) {
      $patern = preg_replace('/\{([a-zA-Z0-9_]+)\}/', '(?P<$1>[a-zA-Z0-9_]+)', $key);
      $patern = "#^$patern$#";
      if (preg_match($patern, $uri, $matches)) {
        $controller = $val['controller'];
        $action = $val['action'];
        // $middleware = $val['middleware'];
        $parms = array_filter($matches, 'is_string', ARRAY_FILTER_USE_KEY);
        return call_user_func_array([new $controller, $action], $parms);
      }
    }
    throw new \Exception("this route $uri not  found");
  }
}
