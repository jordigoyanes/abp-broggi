@extends('templates.master2')

@section('titulo')
LOGIN
@endsection

@section('principal')

<div class="entrar w-100 mt-4 d-flex justify-content-center">
    <div class="col-md-4">
        <div class="card text-center card bg-default mb-3 border-0">

            <div class="card-body">
                <h1 class="font-weight-bold text-uppercase">LOGIN</h1>

                <form action="{{ action('Auth\LoginController@login')}}" method="post">
                    @csrf

                    <input type="text" name="nom" class="form-control input-sm chat-input mt-5  rounded-0 px-4 py-3" placeholder="Username">


                    <input type="password" name="contrasenya" class="form-control input-sm chat-input mt-3 rounded-0 px-4 py-3" placeholder="Password">

                    <button type="submit" class="btn mt-5 font-weight-bold rounded-pill">LOGIN</button>


                </form>

                <a href=" {{ url('/register') }} " class="cambiar"><p class="mt-3 cambiar">¿No tienes cuenta? <u>Regístrate</u></p></a>

            </div>

        </div>
    </div>
</div>




@endsection
