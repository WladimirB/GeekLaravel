<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
Use App\Models\Category;
Use App\Models\User;
use App\Models\SourceOfNews;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\EditNewsArticleRequest;
use App\Http\Requests\CreateSourceRequest;
use App\Http\Requests\CreateCategoryRequest;
use Illuminate\Support\Facades\Auth;


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
      $post=News::findOrFail($id);
      return view('admin.show_news_article', ['article' => $post]);
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
    public function update(EditNewsArticleRequest $request, $id)
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

    public function addCategory(CreateCategoryRequest $request)
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

    public function addSource(CreateSourceRequest $request)
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

    public function showUsers()
    {
      $users = Auth::user() -> getUsersExcept();
      return view('admin.show_users', ['users' => $users]);
    }

    public function makeAdmin(Request $request,$id)
    {
      $user = User::find($id);
      $user->is_admin = 1;
      $result=$user->save();
      if ($result) {
        return redirect()->route('showusers-admin')
                         ->with('success','Изменены права пользователя'.$id);
      }
    }

}
