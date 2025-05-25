<?php

use App\Http\Controllers\HomeCotroller;
use Ilinuminates\Router\Route;

Route::get('/', HomeCotroller::class, 'index');
Route::get('/about', HomeCotroller::class, 'about');
Route::get('/article/{id}', HomeCotroller::class, 'article');
