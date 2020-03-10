@extends('templates.master3')

@section('titulo')
    INCIDENCIES
@endsection

@section('principal')


    
    <div class="row ml-auto mt-4">
        
        <form class="form-inline my-2 my-lg-0">   
            <a href=" {{ route('login') }} " style="text-decoration: none;" type="button" id="novaIncidencia" class=" my-2 my-sm-0 btn-lg mr-5" >NOVA INCIDENCIA </a>         
            
        </form>

    </div>


        <table class="table mt-4">
            <thead style="background:#1CADC3; color:white;">
                <tr>
                    <th>ID</th>
                    <th>LOCALITZACIO</th>
                    <th>HORA</th>
                    <th>TIPUS</th>
                    <th>CIUTAT</th>
                    <th>ADRESA</th>
                    <th>DESCRIPCIO</th>
                    <th>ESTAT</th>                    
                </tr>
            </thead>
            <tbody>
            @foreach ($incidencies as $incidencia)
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
            @endforeach
            </tbody>
        </table>
    



@endsection