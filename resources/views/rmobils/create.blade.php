@extends('templates.master')

@section('titulo')
Recursos Mòbils
@endsection

@section('principal')

<div class="card card-formulari">
    <div class="card-header card-header-formulari ">
        <h2>RECURS MOBIL</h2>
    </div>

    <form action="{{ action('RecursMobilController@store')}}" method="post">
    @csrf

    <div id="accordion" class="card-body card-body-formulari">
        <div>
            <div class="card-subheader card-subheader-formulari" id="headingTwo" data-toggle="collapse"
                data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                <h3 class="mb-0">Nou recurs mòbil</h3>
            </div>

            <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordion">
                <div class="card-subbody card-subbody-formulari d-flex flex-nowrap">

                    <div class="form-group col-6 mt-3">
                        <label for="tipusRecursNou">Tipus</label>
                        <select name="tipusRecurs" id="tipusRecursNou" style="border-radius:10px; margin-left:85px; ; width:200px;" class="tipusRecurs">
                            <option value="0" selected>Selecciona el tipus</option>
                            @foreach ($tipusRecursos as $tipusRecurs)
                                <option value="{{ $tipusRecurs->id }}">{{ $tipusRecurs->tipus }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group col-6 mt-3">
                        <label for="codi" >Codi</label>
                        <input type="text" id="codi" style="border-radius:10px; margin-left:85px; ; width:200px;" value="0" disabled>
                        <input type="hidden" name="codi" id="codi2"value="">
                    </div>

                    </div>
                </div>

            </div>
        </div>

        <div class="card-footer text-muted text-center p-3" style="border-top: 1px solid #1C687D;">
            <button class="btn rounded-pill text-uppercase px-5 text-white" type="submit" style="background-color: #1C687D;">Guardar</button>
            <button class="btn rounded-pill text-uppercase bg-white px-5 ml-4" href="{{ url('/rmobils') }}" style="border: 1px solid #1C687D; color: #1C687D;">Cancelar</button>
        </div>

    </form>
</div>

@endsection
