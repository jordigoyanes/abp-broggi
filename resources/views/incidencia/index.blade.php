@extends('templates.master')

@section('titulo')
    Incidencies actives
@endsection

@section('principal')
@if (Auth::user()->rols_id==2)
    <div class="d-flex justify-content-end">
        <a href="{{ action('IncidenciaController@create') }}" class="text-decoration-none">
            <button class="nuevaIncidencia rounded-pill border-0 d-flex flex-row align-items-center font-weight-bold">
                <p class="align-self-center my-auto text-white">NOVA INCIDENCIA </p>
                <span class="align-self-center my-auto ml-3 text-white"> +</span>
            </button>
        </a>
    </div>
@endif
    <table class="tabla shadow-sm table mt-4" id="tabla-principal">
        <thead class="text-white font-weight-normal">
            <tr>
                <th>ID</th>
                <th class="esconder-xs">LOCALITZACIÓ</th>
                <th>HORA</th>
                <th>TIPUS</th>
                <th>MUNICIPI</th>
                <th>ADREÇA</th>
                <th class="esconder-sm">DESCRIPCIÓ</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($incidencies as $incidencia)
            {{-- ha de portar al formulari ple --}}
            <form action="{{action('IncidenciaController@edit', ['incidencia'=>$incidencia])}}" method="get">
                <tr {{--data-href="{{url('/incidencia', $incidencia->id)}}"--}}>
                {{-- <tr data-href=""> --}}
                    <td>
                        {{-- {{ $incidencia->id }}  --}}
                        <button type="submit" name="editarIncidencia" class="border-0">INC{{ $incidencia->num_incidencia }}</button>
                    </td>
                    <td class="esconder-xs"> @if($incidencia->localitzacio) {{$incidencia->localitzacio}} @else - @endif</td>
                    <td> @if($incidencia->hora){{ $incidencia->hora }} @else - @endif </td>
                    <td>
                        @if ($incidencia->tipus_incident_id)
                        {{ $incidencia->TipusIncident->tipus }}
                        @else - @endif
                    </td>
                    <td>
                        @if ($incidencia->municipis_id)
                        {{ $incidencia->municipi->nom }}
                        @else - @endif
                    </td>
                    <td> @if($incidencia->adreca) {{ $incidencia->adreca }} @else - @endif</td>
                    <td class="esconder-sm">@if($incidencia->descripcio) {{ $incidencia->descripcio }} @else - @endif</td>
                </tr>
            </form>
            @endforeach

            @for($i=0; $i<(10-count($incidencies)); $i++)
                <tr style="height: 40px;">
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            @endfor
        </tbody>
        <tfoot>
            <tr class="p-0">
                <td colspan=10>
                    <div class="d-flex justify-content-center paginacion-tabla">{{ $incidencies->links() }}</div>
                </td>
            </tr>
        </tfoot>
    </table>

    {{-- per fer que les rows de la taula siguin links --}}
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const rows = document.querySelectorAll('tr[data-href]');

            rows.forEach(row => {
                row.addEventListener('click', () => {
                    window.location.href = row.dataset.href;
                });
            });
        });
    </script>

@endsection
