<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GreetingsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PublishController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DownloadNewsController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ContactsController;
use App\Http\Controllers\NewsController;





Route::group(['prefix' => ''],function(){
  Route::get('/main',[MainController::class, 'index'] )->name('main-page');
  Route::get('/',[GreetingsController::class, 'show'])->name('greetings');
  Route::get('/contacts',ContactsController::class)->name('contacts');
  Route::get('/about', function () {
    return view('about');
  })->name('about');
});

Route::get('/category',[CategoryController::class, 'index'])
->name('category');
Route::get('/download', [DownloadNewsController::class, 'index'])
->name('download');
Route::post('/download/submit', [DownloadNewsController::class, 'submit'])
->name('submit');
Route::get('/publish',[PublishController::class, 'add'])->name('add');
Route::post('/publish/add', [PublishController::class,'show'])->
name('publish-form');

Route::get('/login',[LoginController::class,'index'])->name('login-form');
Route::post('/login/auth', [LoginController::class,'auth'])->name('login');

Route::resource('/category/news',NewsController::class);
Route::get('/category/news/articles/{category_id}',
[NewsController::class, 'showCategory'])->name('category-id');
