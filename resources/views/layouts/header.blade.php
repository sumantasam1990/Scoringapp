<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="icon" href="{{ asset('images/fav.png') }}">

        <title>Scorng - {{ $title }}</title>

        <link rel="stylesheet" href={{ asset('css/app.css') }}>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />


        @livewireStyles

    </head>
    <body class="antialiased">

        <nav id="bg-light" class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
              <a class="navbar-brand" href="/">
                  <img src="{{ asset('images/logo.webp') }}" >
              </a>
              <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
{{--                <span class="navbar-toggler-icon"></span>--}}
                  <i class="bi bi-list"></i>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mx-auto">

                    @if (Auth::check())
                        <li class="nav-item">
                            <a class="nav-link dashboard-border" href="/dashboard">Dashboard</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="/faq">FAQ</a>
                        </li>

                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="/howitworks">How It Works</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/features">Features</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/pricing">Pricing</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/faq">FAQ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/about">About us</a>
                        </li>
                    @endif

                  @if (Auth::check())
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            @if(\Illuminate\Support\Facades\Auth::user()->photo == null)
                                <img src="{{ asset('images/user.svg') }}" style="width: 40px; border-radius: 4px; height: 40px; object-fit: cover; border: 3px solid #000; ">
                            @else
                                <img src="{{ asset('uploads/' . \Illuminate\Support\Facades\Auth::user()->photo) }}" style="width: 40px; height: 40px; object-fit: cover; border-radius: 4px; border: 3px solid #000; ">
                            @endif


                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
{{--                        <li><a class="dropdown-item" href="/dashboard">Dashboard</a></li>--}}
{{--                        <li><hr class="dropdown-divider"></li>--}}
                        <li><a class="dropdown-item" href="/signout">Logout</a></li>
                        </ul>
                    </li>
                    @else
                        <li class="nav-item" style="margin-right: 5px;">
                            <a class="btn btn-dark btn-sm" href="/login">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-dark btn-sm" href="/signup">Sign Up</a>
                        </li>
                  @endif



                </ul>
                {{-- <form class="d-flex">
                  <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                  <button class="btn btn-outline-success" type="submit">Search</button>
                </form> --}}
              </div>
            </div>
          </nav>



        <p>&nbsp;</p>
