<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Admin</title>
  <link rel="stylesheet" href="/css/app.css">
</head>
<body>
  <header class="bg-dark">
  <nav class="navbar navbar-lg navbar-expand-lg navbar-transparant navbar-dark navbar-absolute w-100">
      <div class="container">
        <a class="navbar-brand" href="/">MyLaravelSite</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="#">AdminPanel</a>
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Exit
              </a>
          </ul>
        </div>
      </div>
    </nav>
  </header>
  <div class="container">
    <div class="row mt-4">
      <aside class="col-4">
        <h3 class="text-dark text-center">Menu</h3>
        <navbar class="navbar bg-info justify-content-center">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a href="#" class="nav-link text-dark">Все статьи</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link text-dark">Добавить катергорию статей</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link text-dark">Написать пользователю</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link text-dark">Редактировать статью</a>
            </li>
          </ul>
        </navbar>
      </aside>
      <main class="col-8 text-center" style="backgroud-image:url('./images/teble.png')">
        <p>Пользователей в сети:0</p>
        <p>Новых статей:0</p>
      </main>
    </div>
  </div>
  <footer class="py-6 lh-1 bg-white pt-3 border-top fixed-bottom mb-3">
      <div class="container">
        <div class="row">
          <div class="col-md-2">
            <h3 class="h4 mb-4">MyLaravelSite</h3>
          </div>
      <div class="container">
        <div class="row">
          <div class="col-12 text-center text-sm">
            <p class="mb-0">© 2021 - <a href="/">MyLaravelSite</a>.</p>
          </div>
        </div>
      </div>
    </footer>
</body>
</html>
