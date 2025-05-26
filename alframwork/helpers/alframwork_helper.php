<?php

if (!function_exists('url')) {
    function url(string $url = '')
    {
        return $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . '/public/' . ltrim($url, '/');
    }
}

if (!function_exists('base_path')) {
    function base_path($file = null)
    {
        return ROOT_PATH . '/../' . $file;
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
            $file = include base_path('config/') . $seprat[0] . '.php';
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

if (!function_exists('bcrypt')) {
    function bcrypt(string $str)
    {
        return \Ilinuminates\Hashes\Hash::make($str);
    }
}


if (!function_exists('hash_check')) {
    function hash_check(string $password, string $hash)
    {
        return \Ilinuminates\Hashes\Hash::check($password, $hash);
    }
}


if (!function_exists('encrypt')) {
    function encrypt(string $value)
    {
        return \Ilinuminates\Hashes\Hash::encrypt($value);
    }
}

if (!function_exists('decrypt')) {
    function decrypt(string $chipertext)
    {
        return \Ilinuminates\Hashes\Hash::decrypt($chipertext);
    }
}
