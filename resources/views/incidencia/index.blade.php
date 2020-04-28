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
                <tr data-href="{{ action('IncidenciaController@create') }}">
                    <td> {{ $incidencia->id }} </td>
                    <td class="esconder-xs"> {{ $incidencia->localitzacio }} </td>
                    <td> {{ $incidencia->hora }} </td>
                    <td>
                        @if ($incidencia->tipus_incident_id!=null)
                        {{ $incidencia->TipusIncident->tipus }}
                        @endif
                    </td>
                    <td>
                        @if ($incidencia->municipis_id!=null)
                        {{ $incidencia->municipi->nom }}
                        @endif
                    </td>

                    <td> {{ $incidencia->adreca }} </td>
                    <td class="esconder-sm"> {{ $incidencia->descripcio }} </td>
                </tr>
            @endforeach

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
