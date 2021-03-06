@extends('layouts.admin-layout')

@section('content')
 <main class="main-admin">
   <h1 class="text-center text-primary">Все пользователи</h1>
   <div class="table-responsive-md">
    @if(session()->has('success'))
       <div class="alert alert-success">{{session()->get('success')}}</div>
    @endif
    <table class="table">
     <thead class="thead-dark">
       <tr>
         <th>Id</th>
         <th>Имя пользователя</th>
         <th>Email</th>
         <th>Роль</th>
         <th>Управление</th>
       </tr>
     </thead>
   @forelse($users as $user)
      <tr>
        <td>{{$user->id}}</td>
        <td>{{$user->name}}</td>
        <td>{{$user->email}}</td>
        <td>
          @if($user->is_admin)
            Админ
          @else
            нет
          @endif
        </td>
        <td>
          <ul class="nav mx-auto">
           <li class="nav-item">
             <a href="{{route('make-admin',['id'=>$user->id])}}"
             class="nav-link btn btn-info"
             onclick="event.preventDefault();
                     document.getElementById(`grant-form{{$user->id}}`).submit();" class="nav-link">
               Назначить админом
             </a>
           <form id="grant-form{{$user->id}}" action="{{route('make-admin',['id'=>$user->id])}}" method="POST" c-aass="d-none">
             @csrf
           </form>
           </li>
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
