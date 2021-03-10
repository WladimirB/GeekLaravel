@extends('layouts.admin-layout');

@section('content')
 <main>
   <h2 class="text-primary text-center">Добавление категории</h2>
   <form action="{{route('add-category')}}"  method="post" enctype="application/x-www-form-urlencoded">
    @csrf
   <div class="form-group">
    <label for="category">category</label>
    <input type="text" class="form-control" id="category" name="category"
    placeholder="enter news category">
   </div>
     <button class="btn btn-success" type="submit">Добавить категорию</button>
   </form>
 </main>
@endsection
