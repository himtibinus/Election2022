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
    <link href="{{ asset('css/footer.css') }}" rel="stylesheet" type="text/css" />

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
                        <i class="bi bi-box-arrow-left me-2"></i>
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

        <footer class="blur">
          <div class="container py-5">
            <ul class="mb-4 ps-0">
              <li><a href="/">Home</a></li>
              <li><a href="/candidates">Candidates</a></li>
              <li><a href="/vote">Vote</a></li>
              <li><a href="/login">Login</a></li>
            </ul>
            <div class="d-flex justify-content-between align-items-center">
              <p class="mb-0">© 2022 <a href="https://himti.or.id">HIMTI BINUS University</a>.</p>
              <div class="socials">
                <a href="https://www.facebook.com/himtibinus/"><i class="bi bi-facebook"></i></a>
                <a href="https://twitter.com/himtibinus"><i class="bi bi-twitter"></i></a>
                <a href="https://www.youtube.com/user/HimtiBinus"><i class="bi bi-youtube"></i></a>
                <a href="https://instagram.com/himti_binus"><i class="bi bi-instagram"></i></a>
                <a href="https://github.com/himtibinus/"><i class="bi bi-github"></i></a>
                <a href="https://www.tiktok.com/@himtibinus"><i class="bi bi-tiktok pe-0"></i></a>
              </div>
            </div>
          </div>
        </footer>
    </div>
    
    <script src="{{ URL::asset('js/app.js') }}"></script>
    @yield('scripts')
</body>

</html>