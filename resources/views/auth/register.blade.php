@extends('templates.master2')

@section('titulo')
SIGN UP
@endsection

@section('principal')

<div class="w-100 mt-5 d-flex justify-content-center">
    <div class="col-md-4">
        <div class="card text-center card  bg-default mb-3" style="border:none;">

            <div class="card-body">
                <h1>SIGN UP</h1>

                <form action=" {{ action('Auth\RegisterController@register') }} " method="post">
                    @csrf
                    <input type="text" id="nom" name="nom" class="form-control input-sm chat-input mt-5"
                        placeholder="Username" />

                    <input type="text" id="userEmail" name="email" class="form-control input-sm chat-input mt-4"
                        placeholder="Email" />

                    {{-- <input type="number" id="userType" name="rol" class="form-control input-sm chat-input mt-4"
                        placeholder="UserType" min="1" max="2" /> --}}

                        <select name="rol" id="userType" placeholder="UserType" class="custom-select input-sm chat-input mt-4">                       
                                <option value="1" >recurs movil</option>                         
                                <option value="2">getor de dades</option>                           

                        </select>  
                        
                          

                    {{-- <select name="rol" id="userType" placeholder="UserType" class="custom-select input-sm chat-input mt-4">
                        @foreach ($rols as $rol)
                            @if ($rols->rols_id == old('rol'))
                                <option value="{{ $rol->id }}" selected>{{ $rol->nom }}</option>
                            @else
                                <option value="{{ $rol->id }}">{{ $rol->nom }}</option>
                            @endif 

                        @endforeach 
                    </select>   --}}
                          

                    <input type="password" id="contrasenya" name="contrasenya" class="form-control input-sm chat-input mt-4"
                        placeholder="Password" />

                    <input type="password" id="userConfirmPassword" name="conf_contrasenya" class="form-control input-sm chat-input mt-4"
                        placeholder="Confirm Password" />

                    <button id="login" type="submit" class="btn mt-5">SIGN UP</button>


                </form>

                <p id="cuenta" class="mt-4">Ya tienes cuenta? <a id="registrarse" href=" {{ url('/login') }} ">Entra</a></p>

            </div>

        </div>
    </div>
</div>




@endsection