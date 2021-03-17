@extends('layouts.admin-layout')

@section('content')
 <main class="main-admin">
   <h1 class="text-center text-primary">Все категории</h1>
   <div class="table-responsive-md">
    @if(session()->has('success'))
       <div class="alert alert-success">{{session()->get('success')}}</div>
    @endif
    <table class="table">
     <thead class="thead-dark">
       <tr>
         <th>Id</th>
         <th>Имя категории</th>
         <th>Дата добавления</th>
         <th>Управление</th>
       </tr>
     </thead>
   @forelse($categories as $category)
      <tr>
        <td>{{$category->id}}</td>
        <td>{{$category->category}}</td>
        <td>{{$category->created_at}}</td>
        <td>
          <ul class="nav mx-auto">
           <li class="nav-item">
             <a href="#" data-id="{{$category->id}}"
               class="nav-link text-warning btn btn-info btn-sm">Изменить</a>
           </li>
           <li class="nav-item"><a href="#" data-id="{{$category->id}}" data-safe ="{{csrf_token()}}"
             class="nav-link btn btn-danger btn-sm ml-1"  onclick="deleteItem('categories/')">Удалить</a></li>
         </ul>
        </td>
      </tr>
   @empty
      <p>Записей нет</p>
   @endforelse
   </table>
  </div>
  @push('scripts')
  <script src="/js/myscript.js"></script>
  @endpush
 </main>
@endsection
