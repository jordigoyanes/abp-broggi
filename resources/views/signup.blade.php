@extends('templates.master2')

@section('titulo')
    SIGN UP
@endsection

@section('principal')

    <div class="row mt-5">
        <div class="col-md-4 offset-md-4">
            <div class="card text-center card  bg-default mb-3" style="border:none;">
            
                <div class="card-body" >
                    <h1>SIGN UP</h1>

                    <form action="" method="post">
                        <input type="text" id="userName" class="form-control input-sm chat-input mt-5" placeholder="Username" />
                    
                        <input type="password" id="userEmail" class="form-control input-sm chat-input mt-4" placeholder="Email" />

                        <input type="password" id="userType" class="form-control input-sm chat-input mt-4" placeholder="UserType" />

                        <input type="password" id="userPassword" class="form-control input-sm chat-input mt-4" placeholder="Password" />

                        <input type="password" id="userConfirmPassword" class="form-control input-sm chat-input mt-4" placeholder="Confirm Password" />
                        
                        <button id="login"  class="btn mt-5">SIGN UP</button>
                        

                    </form>
                    
                    <p id="cuenta" class="mt-4">Ya tienes cuenta? <a id="registrarse" href="#">Entra</a></p>
                    
                </div>
                 
            </div>
        </div>
    </div>




@endsection