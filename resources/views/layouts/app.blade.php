<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'HIMTI Election 2022') }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/nav.css') }}" rel="stylesheet" type="text/css" />

    @yield('assets')
</head>

<body>
    <div class="app">
        <nav class="navbar navbar-dark navbar-expand-lg blur py-3 fixed-top" id="big-container">
            <div class="container" id="container">
              <a href="/" class="me-3">
                <img src="{{ asset('img/himti.png') }}" width="50px">
              </a>
              <div id="hamburger" class="navbar navbar-dark">
                <div class="container-fluid px-0">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>
              </div>
    
              <div class="collapse navbar-collapse justify-content-between ms-lg-4" id="navbarSupportedContent">
                <ul class="navbar-nav mb-2 mb-lg-0" id="navbar-component">
                  <li class="nav-item">
                    <a class="nav-link @if (session()->get('Page') == 'home')
                      active @endif" id="home" aria-current="page" href="/">Home</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link @if (session()->get('Page') == 'candidate')
                      active @endif" id="candidates" aria-current="page" href="/candidate">Candidates</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link @if (session()->get('Page') == 'vote')
                      active @endif" aria-current="page" href="/vote">Vote</a>
                  </li>
                </ul>
                @guest
                  <div class="nav-item" style="margin-right: 0!important;">
                    <a class="nav-link no-underline" style="padding-right: 0!important;" aria-current="page" href="/login"><button id="login">Login</button></a>
                  </div>
                @else
                  <div class="nav-item dropdown no-underline w-fit" style="padding-right: 0!important;">
                    <a class="nav-link dropdown-toggle no-underline" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      {{ Auth::user()->name }}
                    </a>
                    <ul class="dropdown-menu mt-3" style="left:auto;right:0;">
                      <li><a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                        <svg class="me-1" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-left" viewBox="0 0 16 16">
                          <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z"/>
                          <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z"/>
                        </svg>
                        {{ __('Logout') }}
                        </a>
                      </li>
                    </ul>
                  </div>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST"
                      class="d-none">
                      @csrf
                  </form>
                @endguest
              </div>
            </div>
          </nav>
        <main class="mx-2" style="padding-top: 88px">
            @yield('content')
        </main>
    </div>
    
    <script src="{{ URL::asset('js/app.js') }}"></script>
    @yield('scripts')
</body>

</html>