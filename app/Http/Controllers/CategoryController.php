<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
      private $news = [
      "Actual"=> ["PHP","Stable"],
      "Latest"=> ["WorldNews","TV","Science"],
      "Ad"=>["Missing Dog"],
      "Interesting"=>["PHP Stable Version","Php Latest Version","About Laravel"]
    ];

    public function index(string $category){
      return view('category',[
        'category' => $category,
        'route'=> route('category',['item'=>$category]),
        'news' => $this->news[$category]]);
    }

    public function show(string $category ,string $item){
      return view('article',[
        'article' => $item,
        'category'=> $category]);
    }

    public function add(){
      return view('add_news');
    }
}
