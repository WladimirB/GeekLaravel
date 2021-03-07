<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function index()
    {
      $categories = DB::table('categories')->get();
      return view('categories',['categories' => $categories]);
    }

    public function show($category_id)
    {
      //$news_to_category = DB::table('news')->where('category_id',$category_id)->get();

      dd($category_id);
    }

}
