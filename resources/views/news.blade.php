@extends('layouts.app')

@section('title-string')
  Разделы новостей
@endsection

@section('content')
  <h1 class="text-primary text-center">Новости по категориям</h1>
  <ul class="list-group">
    @foreach ($items as $item)
      <li class="list-group-item bg-dark text-center border border-0">
        <a class="h4"href="/category/{{$item}}">{{$item}}</a>
      </li>
    @endforeach
  </ul>
@endsection
