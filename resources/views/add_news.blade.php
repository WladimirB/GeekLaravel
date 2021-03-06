@extends('layouts.app_main')

@section('title-string')
  Добавление новости
@endsection

@section('content')
<h2 class="text-primary text-center">Добавить новость</h2>
<form action="{{ route('publish-form') }}" method="post"
enctype="application/x-www-form-urlencoded">
  @csrf
  <div class="form-group">
    <label for="email">Адрес почты</label>
    <input class="form-control" type="email" name="email" id="email">
  </div>
  <div class="from-group">
    <label for="name">Ваше имя</label>
    <input type="text" name="name" id="name" class="form-control">
  </div>
  <div class="from-group">
    <label for="article_name">Название статьи</label>
    <input type="text" name="article_name" id="article_name" class="form-control">
  </div>
  <div class="form-group">
    <label for="article_text">Поле ввода новости</label>
    <textarea id="article_text" rows="5" name="article_text"
    class="form-control" placeholder="Текст статьи"></textarea>
  </div>
    <button type="submit" name="submit" class="btn btn-primary">Опубликовать</button>
</form>

@endsection
