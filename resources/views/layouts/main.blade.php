<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset("css/main.css")}}">

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
            integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
            integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
            crossorigin="anonymous"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
    <a class="navbar-brand" href="#">Art Appraisal service</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02"
            aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item">
                <a class="nav-link" href="#">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route("arts.index")}}">Art</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route("literatures.index")}}">Literature</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route("music.index")}}">Music</a>
            </li>
        </ul>
        <ul class="navbar-nav d-flex">
            @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{route('login')}}">Login</a></li>
                @if(Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('register')}}">Register</a></li>
                @endif
            @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdownMenuLink" class="nav-link dropdown-toggle" href="#" role="button"
                       data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">
                        {{Auth::user()->name}}<span class="caret"></span>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Exit</a>
                        <form id="logout-form" action="{{route('logout')}}" method="post" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            @endif
        </ul>
    </div>

</nav>
<div class="container py-4">
    @yield('content')
</div>
</body>
</html>
