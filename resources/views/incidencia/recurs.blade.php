@extends('templates.master4')

@section('titulo')
    INICI
@endsection

@section('principal')
    <div>
        <table class="tabla shadow-sm table mt-4" id="tabla-principal">
            <thead class="text-white">
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


    </div>

    {{-- per fer que les rows de la taula siguin links --}}
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const rows = document.querySelectorAll('tr[data-href]');

            rows.forEach(row => {
                row.addEventListener('click', () => {
                    window.location.href = row.dataset.href;
                });
            })
            // console.log(rows);
        })
    </script>

@endsection
