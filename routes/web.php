<?php

use App\Http\Controllers\HomeCotroller;
use Ilinuminates\Router\Route;

Route::get('/', fn() => 'php farmework');
// Route::get('/', HomeCotroller::class, 'index');
Route::get('/about', HomeCotroller::class, 'about');
// Route::get('/article/{id}', HomeCotroller::class, 'article');
Route::get('/article/{id}',  fn($id) => $id);
