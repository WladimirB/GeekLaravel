<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="/css/app.css">
  <title>@yield('title-string')</title>
</head>
<body>
  @include('inc.header')
  <main class="container">
    <div class="row mt-4">
      <div class="col-12">  @yield('content')</div>
    </div>
  </main>
  @include('inc.footer')
</body>
</html>
