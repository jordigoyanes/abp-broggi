@extends('templates.master2')

@section('titulo')
    SIGN UP
@endsection

@section('principal')

    <div class="row mt-5">
        <div class="col-md-4 offset-md-4">
            <div class="card text-center card  bg-default mb-3" style="border:none;">
            
                <div class="card-body" >
                    <h1>LOGIN</h1>

                    <form action="" method="post">
                        <input type="text" id="userName" class="form-control input-sm chat-input mt-5" placeholder="Username" />
                    
                        <input type="password" id="userPassword" class="form-control input-sm chat-input mt-4" placeholder="Password" />
                        
                        <button id="login"  class="btn mt-5">LOGIN</button>
                        

                    </form>
                    
                    <p id="cuenta" class="mt-4">¿No tienes cuenta? <a id="registrarse" href="#">Regístrate</a></p>
                    
                </div>
                
            </div>
        </div>
    </div>




@endsection