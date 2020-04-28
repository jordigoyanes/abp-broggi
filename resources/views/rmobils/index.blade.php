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
                                <td> {{$ra->id_usuario}} </td>
                                <td>incidencia</td>
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
                        @php
                            $incidencies = DB::table('incidencies_has_recursos')->where('recursos_id', $ri->id)->select('incidencies_id')->first();
                            // print_r($incidencies);
                        @endphp
                            <tr>
                                <td> {{ $ri->tipusRecurs->tipus }} </td>
                                <td> {{ $ri->codi }} </td>
                                <td>-</td>
                                <td>-</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>



@endsection
