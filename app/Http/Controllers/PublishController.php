<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PublishController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function add(){
      return view('add_news');
    }

    public function show(Request $request){
      return view('output',['req' => $request->all()]);
    }
}
