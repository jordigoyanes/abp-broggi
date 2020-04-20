@extends('templates.master2')

@section('titulo')
SIGN UP
@endsection

@section('principal')

<div class="entrar w-100 mt-4 d-flex justify-content-center">
    <div class="col-md-4">
        <div class="card text-center card bg-default mb-3 border-0">

            <div class="card-body">
                <h1 class="font-weight-bold text-uppercase">SIGN UP</h1>

                <form action=" {{ action('Auth\RegisterController@register') }} " method="post">
                    @csrf
                    <input type="text" name="nom" class="form-control input-sm chat-input mt-5 rounded-0 px-4 py-3" placeholder="Username" />

                    <input type="text" name="email" class="form-control input-sm chat-input mt-3 rounded-0 px-4 py-3" placeholder="Email" />

                    <select name="rol" placeholder="UserType" class="custom-select input-sm chat-input mt-3 rounded-0 px-4 py-3">
                        <option>- Seleccionar -</option>
                        <option value="2">Gestor de dades</option>
                        <option value="1">Recurs Mòbil</option>
                            
                    </select>

                    <input type="password" name="contrasenya" class="form-control input-sm chat-input mt-3 rounded-0 px-4 py-3" placeholder="Password" />

                    <input type="password" name="conf_contrasenya" class="form-control input-sm chat-input mt-3 rounded-0 px-4 py-3" placeholder="Confirm Password" />

                    <button type="submit" class="btn mt-5 font-weight-bold rounded-pill login">SIGN UP</button>

                </form>

                <a href=" {{ url('/login') }} " class="cambiar"><p class="mt-3 cambiar">Ya tienes cuenta? <u>Entra</u></p></a>

            </div>

        </div>
    </div>
</div>




@endsection
