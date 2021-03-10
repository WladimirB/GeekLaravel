@extends('layouts.admin-layout');

@section('content')
 <main>
   <h2 class="text-center text-primary">Добавить источник новостей</h2>
   <form action="{{route('add-sourcesofnews')}}"  method="post" enctype="application/x-www-form-urlencoded">
    @csrf
   <div class="form-group">
    <label for="sourceofnews">Источник новостей</label>
    <input type="text" class="form-control" id="sourceofnews" name="sourceofnews"
    placeholder="enter sourceofnews">
   </div>
     <button class="btn btn-success" type="submit">Добавить источник новостей</button>
   </form>
 </main>
@endsection
