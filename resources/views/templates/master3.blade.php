<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('titulo')</title>

    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300;1,400;1,600;1,700;1,800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="icon" href="{{asset('img/logo.png')}}" type="image/png" sizes="16x16">
    <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/formulari.js') }}"></script>
    <script src="{{ asset('js/formacio.js') }}"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">

</head>

<body class="d-flex flex-column">

    <nav class="navbar navbar-expand-md navbar-light bg-transaparent border-bottom d-flex justify-content-between px-5 py-2 mb-4">
         {{-- Logo --}}
         <div>
            <a class="navbar-brand" href="{{ url('/') }}">
                <div style="width:55px; height:55px">
                    <img id="logo" src="{{asset('img/logo.png')}}" class="w-100 h-100" alt="">
                </div>
            </a>

        </div>

        {{-- Burger menu --}}
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        {{-- Menu --}}
        <div class="collapse navbar-collapse d-flex align-items-end justify-content-end align-self-end" id="navbarSupportedContent">
            <ul class="navbar-nav" style="font-size: 14px">
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/incidencia') }}">INCIDENCIES ACTIVES</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/historial') }}">HISTORIAL</a>
                </li>
                @if (Auth::user()->rols_id==2)
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/alertant') }}">ALERTANTS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/rmobils') }}">RECURSOS MÒBILS</a>
                    </li>
                @endif
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        ALTRES
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ url('/formacio') }}">FORMACIO</a>
                        @if (Auth::check())
                            <a class="dropdown-item" href="#">{{ Auth::user()->nom }}</a>
                        @else
                            <a class="dropdown-item" href="#">USUARI</a>
                        @endif

                        <a class="dropdown-item" href="{{ route('logout') }}">SORTIR</a>
                    </div>
                </li>
            </ul>

        </div>
    </nav>


    <div class="flex-column d-flex justify-content-between mb-5">
        <div class="container">
            @yield('principal')
        </div>

    </div>

    <footer class="d-flex mt-auto px-5 py-3">
        <div class="col-4 d-flex align-items-center">CA v</div>
        <div class="col-4 d-flex justify-content-center align-items-center mb-0"><p class="copyright mb-0">&copy; <script>
            document.write(new Date().getFullYear())
            </script> Institut Moisès Broggi</p></div>
        <div class="col-4 d-flex justify-content-end align-items-center">modo on</div>

    </footer>

</body>


</html>
