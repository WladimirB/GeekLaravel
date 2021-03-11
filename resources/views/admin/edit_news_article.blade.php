@extends('layouts.admin-layout');

@section('content')
 <main>
   <h2 class="text-primary text-center">Редактирование новости</h2>
   @if($errors->any())
      <div class="alert alert-danger">
        <ul>
          @foreach($errors->all() as $error)
             <li>{{$error}}</li>
          @endforeach
        </ul>
      </div>
   @endif
   <form action="/admin/{{$id}}" method="post" enctype="application/x-www-form-urlencoded">
     @csrf
     @method('PUT')
     <input type="hidden" name="id" value="{{$id}}">
     <div class="form-group">
       <label for="title">Заголовок</label>
       <input type="text" class="form-control" id="title" name="title"
       placeholder="enter title" value="{{old('title')}}">
     </div>
     <div class="form-group">
       <label for="content">Содержание статьи</label>
       <textarea name="content" id="content" cols="30" rows="3" class="form-control"
        placeholder="enter content">{{old('content')}}</textarea>
     </div>
     <button class="btn btn-success" name="submit"
        value="login-button">Редактировать</button>
   </form>
 </main>
@endsection
