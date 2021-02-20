@extends('layouts.app')

@section('title-string')
  Отчёт
@endsection

@section('content')
@if(is_array($req))
  @foreach($req as $key => $value)
    <p>{{$key}}:{{$value}}</p>
  @endforeach
@elseif(is_string($req))
  <p>{{$req}}<p>
@else
  <h1>Something Wrong</h1>
@endif
@endsection
