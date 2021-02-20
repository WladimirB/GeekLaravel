@extends('layouts.app')

@section('title-string')
  Вход
@endsection

@section('content')
   <h2 class="text-primary text-center">Авторизация</h2>
   <form action="{{route('login')}}" method="post" enctype="application/x-www-form-urlencoded">
     @csrf
     <div class="form-group">
       <label for="login">Login</label>
       <input type="login" class="form-control" id="login" name="login"
       placeholder="enter login">
     </div>
     <div class="form-group">
       <label for="password">Password</label>
       <input type="password" class="form-control" id="password" name="password"
       placeholder="enter password">
     </div>
     <button class="btn btn-success" name="submit" value="login-button">Login</button>
   </form>
@endsection
