@extends('layouts.admin-layout')

@section('content')
 <main class="main-admin">
   <h1 class="text-center text-primary">Все статьи</h1>
   <div class="mx-auto text-center">{{$allNews->links()}}</div>
   <div class="table-responsive-md">
    @if(session()->has('success'))
       <div class="alert alert-success">{{session()->get('success')}}</div>
    @endif
    <table class="table">
     <thead class="thead-dark">
       <tr>
         <th>Id</th>
         <th>Название</th>
         <th>Id автора</th>
         <th>Дата добавления</th>
         <th>Дата изменения</th>
         <th>Id категории</th>
         <th>Id источника</th>
         <th>Управление</th>
       </tr>
     </thead>
   @forelse($allNews as $news)
      <tr>
        <td>{{$news->id}}</td>
        <td>{{$news->title}}</td>
        <td>{{$news->autor_id}}</td>
        <td>{{$news->created_at}}</td>
        <td>{{$news->updated_at}}</td>
        <td>{{$news->category_id}}</td>
        <td>{{$news->source_id}}</td>
        <td>
          <ul class="nav mx-auto">
           <li class="nav-item">
             <a href="/admin/{{$news->id}}/edit"
               class="nav-link text-warning btn btn-info btn-sm">Изменить</a>
           </li>
           <li class="nav-item">
             <a href="{{route('admin.show',['admin' => $news->id])}}"
               class="nav-link text-warning btn btn-primary btn-sm">Подробнее</a>
           </li>
           <li class="nav-item"><a href="#" data-id="{{$news->id}}" data-safe ="{{csrf_token()}}"
             class="nav-link btn btn-danger btn-sm ml-1"
             onclick="deleteItem(`{{route('admin.destroy',['admin' => $news->id])}}`)">Удалить</a></li>
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
