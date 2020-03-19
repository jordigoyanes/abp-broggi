@extends('templates.master3')


@section('titulo')
    INICI
@endsection

@section('principal')

    <button class="nuevaIncidencia"> <a href="{{ url('/incidencia') }}">NOVA INCIDENCIA +</a> </button>
    <table class="table table-bordered" id="tabla-principal">
        <thead style="background-color: #1CADC3; color:white;">
            <tr>
                <th>ID</th>
                <th>LOCALITZACIÓ</th>
                <th>HORA</th>
                <th>TIPUS</th>
                <th>CIUTAT</th>
                <th>ADREÇA</th>
                <th>DESCRIPCIÓ</th>
                <th>ESTAT</th>
            </tr>
        </thead>
        <tbody>
            {{-- @foreach ($incidencies as $incidencia)
                <tr>
                    <td> {{ $incidencia->id }} </td>
                    <td> {{ $incidencia->complement_adreca }} </td>
                    <td> {{ $incidencia->hora }} </td>
                    <td> {{ $incidencia->telefon_alertant }} </td>
                    <td> {{ $incidencia->telefon }} </td>
                    <td> {{ $incidencia->adreca }} </td>
                    <td> {{ $incidencia->descripcio }} </td>
                    <td> {{ $incidencia->data }} </td>
                </tr>
            @endforeach --}}
        </tbody>
    </table>

@endsection
