@extends('templates.master3')

@section('titulo')

Recursos Mòbils

@endsection

@section('principal')


    <button class="nourecurs"> <a href="{{ action('RecursMobilController@create') }}">NOU RECURS +</a> </button>

    
    <div class="row">
        <div class="col-sm-6">
          <div class="card border-0">

            <div class="card-body">
                <h2>ACTIUS</h2>
                <table class="table table-bordered" id="tabla-principal">
                    <thead style="background-color: #1CADC3; color:white;">
                        <tr>
                            <th>ICONA</th>
                            <th>TIPUS</th>
                            <th>CODI</th>
                            <th>INCIDENCIA</th>
                           
                        </tr>
                    </thead>
                    <tbody>
            
                        @foreach ($recursMobils as $recursMobil)
                            <tr>
                                <td>O</td>
                                <td> {{ $recursMobil->tipusRecurs->tipus }} </td>
                                <td> {{ $recursMobil->codi }} </td>
                                <td> {{ $recursMobil->incidencias }} </td>
                                                                        
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
                <h2 style="color:grey;">EN ESPERA</h2>
                <table class="table table-bordered" id="tabla-principal">
                    <thead style="background-color: #1CADC3; color:white;">
                        <tr>
                            <th>ICONA</th>
                            <th>TIPUS</th>
                            <th>CODI</th>
                            <th>INCIDENCIA</th>
                           
                        </tr>
                    </thead>
                    <tbody>
            
                        @foreach ($recursMobils as $recursMobil)
                            <tr>
                                <td>O</td>
                                <td> {{ $recursMobil->tipusRecurs->tipus }} </td>
                                <td> {{ $recursMobil->codi }} </td>
                                <td> - </td>
                                                                        
                            </tr>                
                        @endforeach
                    
                    </tbody>
                </table>
            </div>


           
          </div>
        </div>
      </div>

        
    
@endsection
