<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    private $categories = ["Actual","Latest","Ad","Interesting"];


    public function __invoke(Request $request)
    {
        return view('news',['items' => $this->categories]);
    }
}
