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

  public static function public_path($bind = 'public')
  {
    static::$public = $bind;
    return static::$public;
  }
  public static function add(string $method, string $route, $controller, $action  = null, array $middleware = [])
  {
    $route = ltrim($route, '/');
    self::$routes[$method][$route] = compact('controller', 'action', 'middleware');
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
        $parms = array_filter($matches, 'is_string', ARRAY_FILTER_USE_KEY);
        if (is_object($controller)) {
          echo  $controller(...$parms);
          return '';
        } else {
          $action = $val['action'];
          $middleware = $val['middleware'];
          echo call_user_func_array([new $controller, $action], $parms);
          return '';
        }
      }
    }
    throw new \Exception("this route $uri not  found");
  }
}
