@extends('layouts.app')

@section('title-string')
  Публикация
@endsection

@section('content')
  <!--<h1 class="text-primary text-center">{{$category}}</h1>
  <ul class="list-group">
    @foreach ($news as $article)
      <li class="list-group-item bg-dark text-center border border-0">
        <a class="h4" href="{{$route}}/articles/{{$article}}">{{$article}}</a>
      </li>
    @endforeach
    <li class="list-group-item bg-dark text-center border border-0">
      <a class="text-success h3" href="/add">Добавить новость</a>
    </li>
    <li class="list-group-item bg-dark text-center border border-0">
      <a class="text-warning" href="/news">Назад</a>
    </li>
  </ul>-->
  @foreach($req as $key => $value)
    <p>{{$key}}:{{$value}}</p>
  @endforeach
@endsection
