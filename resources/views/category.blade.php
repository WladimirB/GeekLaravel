@extends('layouts.app')

@section('title-string')
  Новости
@endsection

@section('content')
  <h1 class="text-primary text-center">{{$category}}</h1>
  <ul class="list-group">
    @foreach ($news as $article)
      <li class="list-group-item bg-dark text-center border border-0">
        <a class="h4" href="{{$route}}/{{$article}}">{{$article}}</a>
      </li>
    @endforeach
    <li class="list-group-item bg-dark text-center border border-0">
      <a class="text-success h3" href="{{route('add')}}">Добавить новость</a>
    </li>
    <li class="list-group-item bg-dark text-center border border-0">
      <a class="text-warning" href="{{route('news')}}">Назад</a>
    </li>
  </ul>
@endsection
