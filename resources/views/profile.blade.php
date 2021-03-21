@extends('layouts.app_main')

@section('title-string')
  Профиль
@endsection

@section('content')
<div class="card" style="width:400px">
<img class="card-img-top" src="{{Auth::user()->avatar}}" alt="Card image">
<div class="card-body">
  <h4 class="card-title">{{Auth::user()->name}}</h4>
  <p class="card-text">{{Auth::user()->email}}</p>
  <a href="#" class="btn btn-primary">See Profile</a>
</div>
</div>
@endsection
