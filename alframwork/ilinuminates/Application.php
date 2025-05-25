<?php

namespace Ilinuminates;

use App\Http\Controllers\HomeCotroller;
use Ilinuminates\Router\Route;

class Application
{
    protected Route $router;
    public function start()
    {
        $this->router = new Route;
        include route_path('/web.php');
    }

    public function __destruct()
    {
        $this->router->dispatch($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);
    }
}
