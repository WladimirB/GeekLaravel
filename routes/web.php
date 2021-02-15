<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GreetingsController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PublishController;

Route::get('/',[GreetingsController::class, 'show']);

Route::get('/main', function () {
    return view('main');
});

Route::get('/news', NewsController::class);

Route::get('/category/{item}',[CategoryController::class, 'index'])
->name('category');
Route::get('category/{category}/articles/{article}',[CategoryController::class, 'show']);
Route::get('/add',[CategoryController::class, 'add']);
Route::post('/publish', PublishController::class);

Route::get('/about', function () {
  return view('about');
});

Route::get('/contacts',function () {
  return view('contacts');
});
