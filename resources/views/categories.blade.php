@extends('layouts.app')

@section('title-string')
  Разделы новостей
@endsection

@section('content')
  <h1 class="text-primary text-center">Новости по категориям</h1>
  <ul class="list-group">
    @foreach ($categories as $value)
      <li class="list-group-item bg-dark text-center border border-0">
        <a class="h4"
          href="{{route('category-id',['category_id' => $value->id])}}">
          {{($value->category)}}
        </a>
      </li>
    @endforeach
  </ul>
@endsection
