@extends('layouts.app')

@section('title-string')
  Читать статью
@endsection

@section('content')
  <h1 class="text-primary text-center">{{$article}}</h1>
  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam finibus a urna id eleifend.
     Integer molestie, arcu a lobortis malesuada, arcu risus dapibus tellus,
     nec interdum nulla augue id neque. Donec nec mattis tellus, sed facilisis tellus.
      Nunc a quam tincidunt, porttitor libero id, pharetra lorem.
      Praesent feugiat eu elit sed aliquam. Fusce nec vulputate elit.
      Sed nec dui rutrum, tempus felis ac, tincidunt massa.
       Maecenas lacus leo, mollis ut scelerisque vitae, ultricies vitae velit.
       Donec fermentum ullamcorper dui, ut feugiat erat ultricies in.</p>
  <a href="{{route('news')}}/category/{{$category}}" class="text-warning">Назад</a>
@endsection
