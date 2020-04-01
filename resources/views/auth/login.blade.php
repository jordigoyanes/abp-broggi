@extends('templates.master2')

@section('titulo')
LOGIN
@endsection

@section('principal')

<div class="w-100 mt-5 d-flex justify-content-center">
    <div class="col-md-4">
        <div class="card text-center card  bg-default mb-3" style="border:none;">

            <div class="card-body">
                <h1>LOGIN</h1>

                <form action="{{ action('Auth\LoginController@login')}}" method="post">
                    @csrf
                    
                    <input type="text" id="nom" name="nom" class="form-control input-sm chat-input mt-5"
                        placeholder="Username">

                   
                    <input type="password" id="contrasenya" name="contrasenya" class="form-control input-sm chat-input mt-4"
                        placeholder="Password">

                    <button id="login" type="submit" class="btn mt-5">LOGIN</button>


                </form>

                <p id="cuenta" class="mt-4">¿No tienes cuenta? <a id="registrarse" href=" {{ url('/register') }} ">Regístrate</a></p>
                {{-- <p id="cuenta" class="mt-4">¿No tienes cuenta? <a id="registrarse" href=" {{ action('UsuarioController@create') }} ">Regístrate</a></p> --}}
            </div>

        </div>
    </div>
</div>




@endsection