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
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
              
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ">
              <li class="nav-item">
                <a class="nav-link" href="#">INCIDENCIES ACTIVES</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">HISTORIAL</a>
              </li>     
              <li class="nav-item">
                <a class="nav-link" href="#">ALERTANTS</a>
              </li>  
              <li class="nav-item">
                <a class="nav-link" href="#">RECURSOS MOBILS</a>
              </li>           
              
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  ALTRES
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="#">OPCIO 1</a>
                  <a class="dropdown-item" href="#">OPCIO 2</a>                  
                  <a class="dropdown-item" href="#">SORTIR</a>
                </div>
              </li>
          </ul>
         
        </div>
      </nav>




</body>

<div class="container">
    @yield('principal')
</div>

</html>