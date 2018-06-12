<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css\mycss.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>


    <title>Theatre</title>
</head>
<body>

  <div class="pos-f-t">
              <div class="collapse" id="navbarToggleExternalContent">
                <div class="bg-dark p-4">
                  <h4 class="text-white">Theatre de L'institut des Carriere Commercial</h4>
                  <blockquote class="blockquote">
                  <span class="text-muted">La vie est pièce de théâtre : ce qui compte, ce n'est pas qu'elle dure longtemps, mais qu'elle soit bien jouée.</span>
                    <footer class="blockquote-footer">Sénèque <cite title="Source Title">Artiste, Dramaturge, Homme d'état, Philosophe ( - 65)</cite></footer>
                </blockquote>
                </div>
              </div>
        <nav class="navbar  navbar-collapse navbar-dark bg-dark">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="dropdown">
  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
  menu
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item" href="{{ route('listeSpectacle') }}">Liste Des Spéctacles</a>
    <a class="dropdown-item" href="#">1</a>
    <a class="dropdown-item" href="#">2</a>
  </div>
</div>

                <div class="dropdown">
                      <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Sign
                      </button>
                          <div class="dropdown-menu" aria-labelledby="Connexion">

                @guest
                    <a class="dropdown-item" href="{{ route('login') }}">{{ __('Login') }}</a>
                    <a class="dropdown-item" href="{{ route('register') }}">{{ __('Register') }}</a>
                     @else
                        <li class="nav-item dropdown">
                          <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                           {{ Auth::user()->name }} <span class="caret"></span>
                          </a>
                           <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                            </div>
                        </li>
                        @endguest
  </div>
</div>
</div>

@if(Session::has('success'))
<div class="alert alert-success">{{Session::get('success')}}</div>
@endif
@yield('content')






</body>
</html>