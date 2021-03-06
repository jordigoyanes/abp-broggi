@extends('templates.master')

@section('titulo')

Recursos Mòbils

@endsection

@section('principal')

@php
    use App\Usuario;
@endphp

    <button class="nourecurs"> <a href="{{ action('RecursMobilController@create') }}">NOU RECURS +</a> </button>

    <div class="row mt-4">
        <div class="col-sm-6">
          <div class="card border-0">
            <div class="card-body">
                <h2>ACTIUS</h2>
                <table class="tabla shadow-sm table mt-4" id="tabla-principal">
                    <thead style="background-color: #1CADC3; color:white;">
                        <tr>
                            <th>TIPUS</th>
                            <th>CODI</th>
                            <th>USUARI</th>
                            <th>INCIDENCIA</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($recursActius as $ra)
                            @php
                                $usuario = Usuario::where('id', $ra->id_usuario);
                                // echo $usuario->nom;
                            @endphp
                            <tr>
                                <td> {{ $ra->tipusRecurs->tipus }} </td>
                                <td> {{ $ra->codi }} </td>
                                <td> {{$ra->usuaris->nom}} </td>
                                <td>@if($ra->incidencias()->first())
                                    {{'INC'.$ra->incidencias()->first()->num_incidencia}}
                                    @else - @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="col-sm-6">
        <div class="card border-0">
            <div class="card-body">
                <h2 style="color:grey;">INACTIUS</h2>
                <table class="tabla shadow-sm table mt-4" id="tabla-principal">
                    <thead style="background-color: #1CADC3; color:white;">
                        <tr>
                            <th>TIPUS</th>
                            <th>CODI</th>
                            <th>USUARI</th>
                            <th>INCIDENCIA</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($recursosInactius as $ri)
                            <tr>
                                <td> {{ $ri->tipusRecurs->tipus }} </td>
                                <td> {{ $ri->codi }} </td>
                                <td>-</td>
                                <td>@if($ri->incidencias()->first())
                                    {{'INC'.$ri->incidencias()->first()->num_incidencia}}
                                    @else - @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>



@endsection
