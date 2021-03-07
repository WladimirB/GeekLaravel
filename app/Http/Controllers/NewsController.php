<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news=DB::table('news')->get();
        dd($news);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $post =DB::table('news')
             ->leftJoin('users','news.autor_id','=','users.id')
             ->leftJoin('source_of_news', 'news.source_id', '=', 'source_of_news.id')
             ->where('news.id','=',$id)
             ->get();
      //dd($post);
      return view('article', ['article' => $post[0]]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function showCategory($category_id)
    {
      $category = DB::table('categories')->find($category_id);
      $news_to_category = DB::table('news')
                          ->where('category_id', '=' , $category_id)
                          ->select('id','title')
                          ->get();
      return view('news',[
                           'category' => $category->category,
                           'news' => $news_to_category
                         ]);
    }
}
