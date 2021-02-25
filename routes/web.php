<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GreetingsController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PublishController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DownloadNewsController;


Route::group(['prefix' => ''],function(){
  Route::get('/main', function () {
      return view('main');
  })->name('main-page');
  Route::get('/',[GreetingsController::class, 'show'])->name('greetings');
  Route::get('/contacts',function () {
    return view('contacts');
  })->name('contacts');
  Route::get('/about', function () {
    return view('about');
  })->name('about');
});

Route::group(['prefix' => 'news'], function(){
  Route::get('/', NewsController::class)->name('news');
  Route::get('/category/{item}',[CategoryController::class, 'index'])
  ->name('category');
  Route::get('/category/{category}/{article}',
    [CategoryController::class, 'show'])->name('articles');
  Route::get('/download', [DownloadNewsController::class, 'index'])
  ->name('download');
  Route::post('/download/submit', [DownloadNewsController::class, 'submit'])
  ->name('submit');
  Route::get('/publish',[PublishController::class, 'add'])->name('add');
  Route::post('/publish/add', [PublishController::class,'show'])->
  name('publish-form');
});

Route::get('/login',[LoginController::class,'index'])->name('login-form');
Route::post('/login/auth', [LoginController::class,'auth'])->name('login');
