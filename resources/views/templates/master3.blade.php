<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('titulo')</title>

    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="icon" href="{{asset('img/logo.png')}}" type="image/png" sizes="16x16">
    <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/vue.js') }}"></script>
    <script src="{{ asset('js/axios.min.js') }}"></script>


</head>


<body>

    <nav class="mb-3 navbar navbar-expand-lg navbar-light bg-transaparent border-bottom">
        <a class="navbar-brand" href="#"><img id="logo" src="{{asset('img/logo.png')}}" class="ml-5" alt=""></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse mr-5" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/incidencia') }}">INCIDENCIES ACTIVES</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/historial') }}">HISTORIAL</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/alertant') }}">ALERTANTS</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/rmobils') }}">RECURSOS MÒBILS</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        ALTRES
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">FORMACIO</a>
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


    <div class="flex-column d-flex justify-content-between h-100">
        <div class="container">

            @yield('principal')
        </div>

        <footer class="d-flex justify-content-center mt-2 p-1">
            <p class="copyright mb-0 p-1">&copy; <script>
                document.write(new Date().getFullYear())
                </script> Institut Moisès Broggi</p>
        </footer>
    </div>

</body>


</html>
