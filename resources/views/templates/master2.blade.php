<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('titulo')</title>

    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style2.css') }}">
    <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>

</head>


<body>

      <nav class="mb-3 navbar navbar-expand-lg navbar-light bg-transaparent border-bottom">
        <a class="navbar-brand" href="#"><img id="logo" src="./img/logo.png" class="ml-5" alt=""></a>


        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">

          </ul>
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
