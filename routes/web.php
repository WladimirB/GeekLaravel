<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GreetingsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PublishController;
use App\Http\Controllers\DownloadNewsController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ContactsController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;


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

Route::resource('/category/news', NewsController::class);


Route::get('/category/news/articles/{category_id}',
[NewsController::class, 'showCategory'])->name('category-id');

Route::group(
  [
    'prefix' => 'controls',
    'middleware' => ['auth', 'is.admin']
  ],
  function () {
    Route::resource('/admin', AdminController::class);
    Route::get('/news/show', [AdminController::class, 'showNewsAll'])
    ->name('news-admin');
    Route::get('/categories/show', [AdminController::class, 'showCategoriesAll'])
    ->name('categories-admin');
    Route::get('/sourcesofnews/show', [AdminController::class, 'showSourcesOfNewsAll'])
    ->name('sourceofnews-admin');

    Route::get('/categories/create', [AdminController::class, 'createCategory'])
    ->name('create-category');
    Route::post('/categories/create', [AdminController::class, 'addCategory'])
    ->name('add-category');
    Route::delete('/categories/{id}', [AdminController::class, 'deleteCategory'])
    ->name('delete-category');

    Route::get('/sourceofnews/create', [AdminController::class, 'createSourceOfNews'])
    ->name('create-sourcesofnews');
    Route::post('/sourceofnews/store', [AdminController::class, 'addSource'])
    ->name('add-sourcesofnews');
    Route::delete('/sourceofnews/{id}', [AdminController::class, 'deleteSource'])
    ->name('delete-sourcesofnews');

    Route::get('/users', [AdminController::class, 'showUsers'])->name('showusers-admin');
    Route::post('/users/{id}',[AdminController::class, 'makeAdmin'])->name('make-admin');
  }
);

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::get('/home', [HomeController::class, 'index'])->name('home');

//Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
