@extends('layouts.admin-layout')

@section('content')
 <main class="main-admin">
   <h1 class="text-center text-primary">Подробный просмотр статьи</h1>
   <div class="table-responsive-md">
    @if(session()->has('success'))
       <div class="alert alert-success">{{session()->get('success')}}</div>
    @endif
    <h1 class="text-center">{{$article->title}}</h1>
    <h3 class="text-muted">Категория:<span class="text-info">{{$article->category()}}</span></h3>
    <h3 class="text-muted">Автор:<span class="text-info">{{$article->autor()}}</span></h3>
    <p>{{$article->content}}</p>
    <p class="text-dark">Дата публикации:{{$article->created_at}}</p>
    <p class="text-dark">Отредактировано:{{$article->updated_at}}</p>
    <h3 class="text-muted">Источник:<span class="text-info">{{$article->source()}}</span></h3>
    <a href="{{route('news-admin')}}" class="text-warning">Назад</a></br>
    <a href="#" class="text-warning">На Главную</a>
  </div>
 </main>
@endsection
