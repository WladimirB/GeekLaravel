@extends('layouts.app')

@section('title-string')
 Главная
@endsection

@section('content')
 <div class="text-center">
   <h1 class="text-primary">Главная страница сайта</h1>
 </div>
@endsection

@section('aside')
  @parent
  <p>Домашняя страница</p>
@endsection
