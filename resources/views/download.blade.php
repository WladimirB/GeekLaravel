@extends('layouts.app_main')

@section('title-string')
  Загрузка
@endsection

@section('content')
   <h2 class="text-primary text-center">Форма для заявки на получение новости</h2>
   @if($errors->any())
      <div class="alert alert-danger">
        <ul>
          @foreach($errors->all() as $error)
             <li>{{$error}}</li>
          @endforeach
        </ul>
      </div>
   @endif
   <form action="{{route('submit')}}" method="post" enctype="application/x-www-form-urlencoded">
     @csrf
     <div class="form-group">
       <label for="name">Имя</label>
       <input type="text" class="form-control" id="login" name="name"
       placeholder="enter name" value="{{old('name')}}">
     </div>
     <div class="form-group">
       <label for="phoneNumber">PhoneNumber</label>
       <input type="number" class="form-control" id="phoneNumber" name="phoneNumber"
       placeholder="enter phoneNumber" value="{{old('phoneNumber')}}">
     </div>
     <div class="form-group">
       <label for="email">Email</label>
       <input type="email" class="form-control" id="email" name="email"
       placeholder="enter email" value="{{old('email')}}">
     </div>
     <div class="form-group">
       <label for="info">Information to search</label>
       <textarea name="info" id="info" cols="30" rows="3" class="form-control"
        placeholder="Желаемая информация">{{old('info')}}</textarea>
     </div>
     <button class="btn btn-success" name="submit" value="login-button">Отпрваить заявку</button>
   </form>
@endsection
