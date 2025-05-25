<?php


if (!function_exists('base_path')) {
    function base_path($file = null)
    {
        return getcwd() . '/../' . $file;
    }
}


if (!function_exists('route_path')) {
    function route_path($file = null)
    {
        return !is_null($file) ? config('route.path') . '/' . $file : config('route.path');
    }
}


if (!function_exists('config')) {
    function config($file = null)
    {
        $seprat = explode('.', $file);
        if (!empty($seprat) && !is_null($file)) {
            $file = include_once base_path('config/') . $seprat[0] . '.php';
            return isset($file[$seprat[1]]) ? $file[$seprat[1]] : $file;
        }

        return $file;
    }
}

if (!function_exists('public_path')) {
    function public_path($file = null)
    {
        return !empty($file) ? getcwd() . '/' . $file : getcwd();
    }
}
