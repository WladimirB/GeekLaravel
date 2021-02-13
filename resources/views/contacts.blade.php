@extends('layouts.app')

@section('title-string')
Contacts
@endsection

@section('content')
<form action="">
  <div class="form-group">
    <label for="login">Login</label>
    <input type="text"  id="login" class="form-control">
  </div>
  <div class="form-group">
    <label for="email">Email</label>
    <input type="email" id="email" class="form-control">
  </div>
  <div class="form-group">
    <label for="message">message</label>
    <textarea type="text" class="form-control"></textarea>
  </div>
  <button type="submit" class="btn btn-primary">отправить</button>
</form>
@endsection
