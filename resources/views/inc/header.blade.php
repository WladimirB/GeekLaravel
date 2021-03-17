<header class="bg-dark">
<nav class="navbar navbar-lg navbar-expand-lg navbar-transparant navbar-dark navbar-absolute w-100">
    <div class="container">
      <a class="navbar-brand" href="{{route('greetings')}}">MyLaravelSite</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="{{route('main-page')}}">Overview</a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="{{route('main-page')}}" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Main
            </a>
          <li class="nav-item ">
            <a class="nav-link" href="{{route('category')}}" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              News
            </a>
          </li>
          <li>
            <a class="nav-link" href="{{route('about')}}" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              About
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="{{route('login')}}" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               Login
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="{{route('register')}}" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               Register
            </a>
          </li>
          <li class="nav-item ">
            <a href="/logout"
            onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();" class="nav-link">
              Logout
            </a>
          <form id="logout-form" action="/logout" method="POST" class="d-none">
            @csrf
          </form>
          <li class="nav-item ">
            <a class="nav-link" href="{{route('contacts')}}" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Contacts
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</header>
