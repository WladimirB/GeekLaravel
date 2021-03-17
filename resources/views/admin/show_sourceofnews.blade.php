@extends('layouts.admin-layout')

@section('content')
 <main>
   <h2 class="text-center text-primary">Все источники новостей</h2>
   @if(session()->has('success'))
      <div class="alert alert-success">{{session()->get('success')}}</div>
   @endif
   <div class="table-responsive-md">
    <table class="table">
     <thead class="thead-dark">
       <tr>
         <th>Id</th>
         <th>Имя источника</th>
         <th>Актуальность</th>
         <th>Дата изменения</th>
         <th>Управление</th>
       </tr>
     </thead>
   @forelse($sources as $item)
      <tr>
        <td>{{$item->id}}</td>
        <td>{{$item->source}}</td>
        <td>
          @if($item->is_actual)
           Актуальный
          @else
            Неактуалньный
          @endif
        </td>
        <td>
          @if($item->updated_at)
           {{$item->updated_at}}
          @else
           Не изменялся
          @endif
        </td>
        <td>
          <ul class="nav mx-au">
           <li class="nav-item">
             <a href="#" class="nav-link text-warning btn btn-info btn-sm">Изменить</a>
           </li>
           <li class="nav-item">
             <a href="#" data-id="{{$item->id}}" data-safe ="{{csrf_token()}}"
             class="nav-link btn btn-danger btn-sm ml-1"
             onclick="deleteItem('sourceofnews/')">Удалить</a></li>
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
