@extends('templates.master2')

@section('titulo')
    SIGN UP
@endsection

@section('principal')

<style>
#login{
    padding-left:80px;
    font-weight: bold; 
    padding-right:80px;
    border-radius:20px; 
    border:none; 
    color:white; 
    background-color:#1CADC3;
        
}

input::-webkit-input-placeholder{
    color:#B09B27;
}
input:-moz-placeholder {
    color:#B09B27;
}
::placeholder {
    color: #B09B27;
  
}

</style>

<div class="container">

    <div class="row mt-5">
        <div class="col-md-4 offset-md-4">
            <div class="card text-center card  bg-default mb-3" style="border:none;">
            
                <div class="card-body" >
                    <h1 style="font-weight:bold;">LOGIN</h1>

                    <form action="" method="post">
                        <input style="border:none;background:#FEF1D0;color:#B09B27;padding:20px;" type="text" id="userName" class="form-control input-sm chat-input mt-5" placeholder="Username" />
                    
                        <input style="border:none;background:#FEF1D0;color:#B09B27;padding:20px;" type="password" id="userPassword" class="form-control input-sm chat-input mt-4" placeholder="Password" />
                        
                        <button id="login" type="submit" class="btn mt-5">LOGIN</button>
                        

                    </form>
                    
                    <p style="color:#1C687D;" class="mt-4">¿No tienes cuenta? <a style="color:#1C687D;" href="#">Regístrate</a></p>
                    
                </div>
                
            </div>
        </div>
    </div>
</div>



@endsection