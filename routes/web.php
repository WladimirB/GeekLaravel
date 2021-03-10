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
use App\Http\Controllers\AdminController;



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

Route::resources([
  '/category/news' => NewsController::class,
  '/admin' => AdminController::class]);

Route::get('/category/news/articles/{category_id}',
[NewsController::class, 'showCategory'])->name('category-id');

Route::get('/admin/news/show', [AdminController::class, 'showNewsAll'])
->name('news-admin');
Route::get('/admin/categories/show', [AdminController::class, 'showCategoriesAll'])
->name('categories-admin');
Route::get('/admin/sourcesofnews/show', [AdminController::class, 'showSourcesOfNewsAll'])
->name('sourceofnews-admin');

Route::get('/admin/categories/create', [AdminController::class, 'createCategory'])
->name('create-category');
Route::post('/admin/categories/create', [AdminController::class, 'addCategory'])
->name('add-category');
Route::delete('/admin/categories/{id}', [AdminController::class, 'deleteCategory'])
->name('delete-category');

Route::get('/admin/sourceofnews/create', [AdminController::class, 'createSourceOfNews'])
->name('create-sourcesofnews');
Route::post('/admin/sourceofnews/store', [AdminController::class, 'addSource'])
->name('add-sourcesofnews');
Route::delete('/admin/sourceofnews/{id}', [AdminController::class, 'deleteSource'])
->name('delete-sourcesofnews');
