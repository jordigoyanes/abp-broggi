@extends('templates.master3')


@section('titulo')
    INICI
@endsection

@section('principal')

    <div class="d-flex justify-content-end">
        <a href="{{ action('IncidenciaController@create') }}" class="text-decoration-none">
            <button class="nuevaIncidencia rounded-pill border-0 d-flex flex-row align-items-center font-weight-bold">
                <p class="align-self-center my-auto text-white">NOVA INCIDENCIA </p>
                <span class="align-self-center my-auto ml-3 text-white"> +</span>
            </button>
        </a>
    </div>

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
                    <th>ESTAT</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($incidencies as $incidencia)
                {{-- ha de portar al formulari ple --}}
                    <tr data-href="{{ action('IncidenciaController@create') }}">
                        <td> {{ $incidencia->id }} </td>
                        <td class="esconder-xs"> {{ $incidencia->localitzacio }} </td>
                        <td> {{ $incidencia->hora }} </td>
                        <td> {{ $incidencia->TipusIncident->tipus }} </td>
                        <td> {{ $incidencia->municipi->nom }} </td>
                        <td> {{ $incidencia->adreca }} </td>
                        <td class="esconder-sm"> {{ $incidencia->descripcio }} </td>
                        <td> {{ $incidencia->EstatIncidencia->estat }} </td>
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
