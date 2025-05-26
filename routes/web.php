<?php

use App\Http\Controllers\HomeCotroller;
use App\Http\Middlewares\SimpleMiddleware;
use Ilinuminates\Router\Route;

// Route::get('/', fn() => 'php farmework', [SimpleMiddleware::class]);
Route::get('/', HomeCotroller::class, 'index');
Route::get('/about', HomeCotroller::class, 'about', [SimpleMiddleware::class]);
// Route::get('/article/{id}', HomeCotroller::class, 'article');
Route::get('/article/{id}',  fn($id) => $id);
