<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
Use App\Models\Category;
use App\Models\SourceOfNews;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.main');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('admin.create_news');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $news = new News;
        $defaultCategory = 12;
        $defaultSource = 7;
        $defaultAutor = 6;
        $news->title = $request->title;
        $news->content = $request->content;
        $news->fill([
                     'autor_id' => $defaultAutor,
                     'category_id' => $defaultCategory,
                     'source_id' => $defaultSource
                   ]);
        $inserted = $news->save();
        if ($inserted){
          return redirect()->route('news-admin')->with('success','Добавлена новая статья');
        }
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
      return view('admin.show_news_article', ['article' => $post[0]]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      return view('admin.edit_news_article',['id' => $id]);
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
        $updated = News::find($id);
        $updated->title = $request->title;
        $updated->content = $request->content;
        $result = $updated->save();
        if ($result) {
        return redirect()->route('news-admin')->with('success','Отредактирована новость '.$id);
       }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $deletedRows = News::where('id','=', $id)->delete();
      if($deletedRows){
        return response('Ok', 200)
                  ->header('Content-Type', 'text/plain');
      }
    }

    public function showNewsAll()
    {
      $news = News::select('*')
             ->orderBy('id','asc')
             ->paginate(5);
      return view('admin.show_news',['allNews' => $news]);
    }

    public function showCategoriesAll()
    {
      $categories = Category::all();
      return view('admin.show_categories', ['categories' => $categories]);
    }

    public function showSourcesOfNewsAll()
    {
      return view('admin.show_sourceofnews', ['sources' => SourceOfNews::all()]);
    }

    public function createCategory()
    {
      return view('admin.create_category');
    }

    public function createSourceOfNews()
    {
      return view('admin.create_sourceofnews');
    }

    public function addCategory(Request $request)
    {
      $category = new Category;
      $category->category = $request->category;
      $category->fill(['created_at' => now()]);
      $insert = $category->save();
      if ($insert){
        return redirect()->route('categories-admin')->with('success','Добавлена новая категория');
      }
    }

    public function deleteCategory($id)
    {
      $deletedRows = Category::where('id','=', $id)->delete();
      if($deletedRows){
        return response('Ok', 200)
                  ->header('Content-Type', 'text/plain');
      }
    }

    public function addSource(Request $request)
    {
      $source = new SourceOfNews;
      $source->source = $request->sourceofnews;
      $source->fill([
        'is_actual' => 1,
        'updated_at' => now()
      ]);
      $insRow = $source->save();
      if ($insRow) {
         return redirect()->route('sourceofnews-admin')
                          ->with('success','Добавлен новый источник новостей');
      }
    }

    public function deleteSource($id){
      $deletedRows = SourceOfNews::where('id','=', $id)->delete();
      if($deletedRows){
        return response('Ok', 200)
                  ->header('Content-Type', 'text/plain');
      }
    }

}
