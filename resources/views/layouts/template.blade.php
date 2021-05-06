<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ URL::asset('css/app.css') }}" type="text/css" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js"></script>
    <script type="text/javascript" src="{{ URL::asset('js/divers.js') }}"></script>
</head>


<div class="container">
    <div class="menu">
        <a class="menu-element font" href="/"><i class="fas fa-home"></i></a>
        <a id="search-btn" class="menu-element font"><i class="fas fa-search"></i></a>
        <a class="menu-element font" href="/create"><i class="fas fa-plus-circle"></i></a>
        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="/users/{{Auth::id()}}" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
            <i class="fas fa-user"></i>
        </a>
    </div>
    <div class="header">
        <div class="logo">
            <a href="/">Instagram</a>
        </div>
        <div class="dropdown_menu">
            <button><i class="fas fa-power-off"></i></button>
            <div class="connexion_menu">
                @guest
                @if (Route::has('login'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Connexion') }}</a>
                </li>
                @endif

                @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Inscription') }}</a>
                </li>
                @endif
                @else

                <div class="dropdown_menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                            {{ __('Déconnexion') }}
                        </a></li>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>

                @endguest
            </div>
        </div>
    </div>

    <div id="searchbar">
        <div class="close-btn">
            <i class="fas fa-times"></i>
        </div>
        <form id="searchform">
            <input type="search" placeholder="Rechercher une photo">
        </form>
    </div>

    <main class="content">
        @yield("content")
    </main>
</div>