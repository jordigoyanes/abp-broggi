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
        
      <nav class="navbar navbar-expand-lg navbar-light bg-transaparent border-bottom">
        <a class="navbar-brand" href="#"><img src="./img/logo.png" class="ml-5" style="width:60px;height:60px;"  alt=""></a>
        
      
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
                        
          </ul>          
        </div>
      </nav>




</body>

<div class="container">
    @yield('principal')
</div>

</html>