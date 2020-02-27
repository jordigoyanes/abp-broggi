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

<style>
  #signup{
    padding-left:45px;
    font-weight: bold; 
    padding-right:45px;
    border-radius:30px; 
    border:none; 
    color:white; 
    background-color:#FCC536;
  }

</style>

<body>
        
      <nav class="navbar navbar-expand-lg navbar-light bg-transaparent border-bottom">
        <a class="navbar-brand" href=""><img src="./img/logo.png" class="ml-5" style="width:60px;height:60px;"  alt=""></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
                        
          </ul>
          <form class="form-inline my-2 my-lg-0">   
            <a href=" {{ route('login') }} " style="text-decoration: none;" type="button" id="signup" class=" my-2 my-sm-0 btn-lg mr-5" >SIGN UP</a>         
            
          </form>
        </div>
      </nav>




</body>

<div class="container">
    @yield('principal')
</div>

</html>