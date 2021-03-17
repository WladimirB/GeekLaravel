@extends('layouts.app_main')

@section('title-string')
  Читать статью
@endsection

@section('content')
  <h1 class="text-primary text-center">{{$article->title}}</h1>
  <h3 class="text-info">Автор:{{$article->name}}</h3>
  <p>{{$article->content}}</p>
  <p class="text-dark">Дата публикации:{{$article->created_at}}</p>
  <h3 class="text-info">Источник:{{$article->source}}</h3>
  <a href="#" class="text-warning">Назад</a></br>
  <a href="#" class="text-warning">На Главную</a>
@endsection
