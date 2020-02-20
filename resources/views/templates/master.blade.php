<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('titulo')</title>

    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}"> 
    
    <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>

</head>
<body>
    
    <nav class="navbar navbar-expand-lg navbar-transparent bg-transparent border-bottom">
        <img src="./img/logo.png" style="width:80px;height:80px;"  alt="">
                
        <div class="collapse navbar-collapse" id="navbarColor03">
          <ul class="navbar-nav mr-auto">
           
          </ul>
          <form class="form-inline my-2 my-lg-0 m-4">           
            <button class="btn btn-danger my-2 my-sm-0" style="border-radius:30px;" type="submit">SIGN UP</button>
          </form>
        </div>
      </nav>


</body>

<div class="container">
    @yield('principal')
</div>

</html>