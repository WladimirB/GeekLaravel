<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GreetingsController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PublishController;
use App\Http\Controllers\LoginController;

Route::get('/',[GreetingsController::class, 'show']);

Route::get('/main', function () {
    return view('main');
});

Route::get('/news', NewsController::class);

Route::get('/category/{item}',[CategoryController::class, 'index'])
->name('category');

Route::get('/category/{category}/{article}',
  [CategoryController::class, 'show'])->name('articles');

Route::get('/publish',[PublishController::class, 'add'])->name('add');

Route::post('/publish/add', [PublishController::class,'show'])->
name('publish-form');

Route::get('/about', function () {
  return view('about');
});

Route::get('/login',[LoginController::class,'index'])->name('login-form');
Route::post('/login/auth', [LoginController::class,'auth'])->name('login');

Route::get('/contacts',function () {
  return view('contacts');
});
