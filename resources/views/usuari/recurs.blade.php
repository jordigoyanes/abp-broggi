@extends('templates.master')
@section('titulo')Afegeix els recursos al teu usuari @endsection
@section('principal')

<div class="card card-formulari">
    <div class="card-header card-header-formulari ">
        <h2>RECURSOS MÒBILS</h2>
    </div>

    <form action="{{ action('UsuarioController@store') }}" method="post">
    @csrf

    <div id="accordion" class="card-body card-body-formulari">
        <div>
            <div id="collapseFour" class="collapse show" aria-labelledby="headingFour" data-parent="#accordion">
                <div class="card-subbody-formulari recursos">
                    <div class="recursUsuari mt-3" id="recursUsuari1">
                        <div class="form-row">
                            <div class="form-group col-6">
                                <label for="tipusRecursUsuari">Tipus</label>
                                <select name="tipusRecursUsuari" id="tipusRecursUsuari1" style="border-radius:10px; margin-left:85px; ; width:200px;" class="tipusRecursUsuari">
                                    <option value="0" selected>Selecciona el tipus</option>
                                </select>
                            </div>

                            <div class="form-group col-6">
                                <label for="CodiRecursUsuari1">Codi</label>
                                <select name="CodiRecursUsuari1" id="CodiRecursUsuari1" style="border-radius:10px; margin-left:85px; ; width:200px;">
                                    <option value="">Selecciona un codi</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-center card-subbody-formulari" >
                    <input type="hidden" id="numRecursos" name="numRecursos" value="1">
                    <p class="my-auto mr-3 afegirp">Afegir recurs</p>
                    <button class="afegir rounded-circle border-0 d-flex flex-row align-items-center btn-sm" id="afegirRecursUsuari" type="button">
                        <span class="align-self-center my-auto text-white">+</span>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="card-footer text-muted text-center p-3" style="border-top: 1px solid #1C687D;">
        <button class="btn rounded-pill text-uppercase px-5 text-white" type="submit" style="background-color: #1C687D;">Guardar</button>
        <a href="{{ url('/incidencia') }}"><div class="btn rounded-pill text-uppercase bg-white px-5 ml-4" style="border: 1px solid #1C687D; color: #1C687D;" type="button">Cancelar</div></a>
    </div>

    </form>
</div>

@endsection
