<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('titulo')</title>

    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}"> 
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>

</head>
<body>
    
    <nav class="navbar navbar-expand-lg navbar-transparent bg-transparent">
        <img src="./img/logo.svg" style="width:60px; height:60px" alt="">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor03" aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarColor03">
          <ul class="navbar-nav mr-auto">
           
          </ul>
          <form class="form-inline my-2 my-lg-0">           
            <button class="btn btn-danger my-2 my-sm-0" type="submit">SING UP</button>
          </form>
        </div>
      </nav>

<div class="container">
    @yield('principal')
</div>

<footer class="d-flex justify-content-center p-1">
    <p class="copyright mb-0 p-1">&copy; <script>document.write(new Date().getFullYear())</script> Institut Moisès Broggi</p>
</footer>
</body>
</html>