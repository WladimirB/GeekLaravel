@extends('layouts.admin-layout');

@section('content')
 <main>
   <h2 class="text-primary text-center">Создание новости</h2>
   @if($errors->any())
      <div class="alert alert-danger">
        <ul>
          @foreach($errors->all() as $error)
             <li>{{$error}}</li>
          @endforeach
        </ul>
      </div>
   @endif
   <form action="{{route('admin.store')}}" method="post" enctype="application/x-www-form-urlencoded">
     @csrf
     <div class="form-group">
       <label for="title">Заголовок</label>
       <input type="text" class="form-control" id="title" name="title"
       placeholder="enter title" value="{{old('name')}}">
     </div>
     <div class="form-group">
       <label for="category">Категория</label>
       <input type="text" class="form-control" id="category" name="category"
       placeholder="enter category" value="{{old('category')}}">
     </div>
     <div class="form-group">
       <label for="sourceofnews">Источник</label>
       <input type="text" class="form-control" id="sourceofnews" name="sourceofnews"
       placeholder="enter sourcesofnews" value="{{old('sourcesofnews')}}">
     </div>
     <div class="form-group">
       <label for="content">Содержание статьи</label>
       <textarea name="content" id="content" cols="30" rows="3" class="form-control"
        placeholder="enter content">{{old('info')}}</textarea>
     </div>
     <button class="btn btn-success" name="submit"
        value="login-button">Добавить новость</button>
   </form>
 </main>
@endsection
