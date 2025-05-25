<?php

namespace App\Http\Controllers;

class HomeCotroller
{
    public function index()
    {
        echo "this is index";
    }

    public function about()
    {
        echo "this is about";
    }

    public function article($id)
    {
        echo "this is article" . $id;
    }
}
