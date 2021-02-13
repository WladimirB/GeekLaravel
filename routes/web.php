<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('main');
});

Route::get('/about', function () {
  return view('about');
});

Route::get('/contacts',function () {
  return view('contacts');
});
