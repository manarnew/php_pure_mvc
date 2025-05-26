<?php

namespace Ilinuminates;

use App\Core;
use App\Http\Controllers\HomeCotroller;
use Ilinuminates\Router\Route;
use Ilinuminates\Sessions\Session;

class Application
{
    protected Route $router;
    public function start()
    {
        $this->router = new Route;
        $this->webRoute();
    }

    public function __destruct()
    {
        $this->router->dispatch($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);
    }
    public function webRoute()
    {
        foreach (Core::$globalWeb as $global) {
            new $global();
        }
        include route_path('/web.php');
    }

    public function apiRoute()
    {
        foreach (Core::$globalApi as $global) {
            new $global();
        }

        include route_path('/api.php');
    }
}
