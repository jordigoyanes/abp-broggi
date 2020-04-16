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
                        
                        @if ($recursMobil->estat == 'activa')
                       
                        <tr>
                            <td>O</td>
                            <td> {{ $recursMobil->tipusRecurs->tipus }} </td>
                            <td> {{ $recursMobil->codi }} </td>
                            <td> <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Incidencias</button> </td>

                            
                            <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        
                                        <div class="card-deck">

                                            @foreach ($recursMobil->Incidencias as $item)

                                            <div class="card">                                                    
                                                <div class="card-body">
                                                    <p class="card-text">#{{ $item->id }}</h4>
                                                    <p class="card-text">{{ $item->localitzacio }}</p>
                                                </div>
                                            </div>
                                            
                                            @endforeach 
                                           
                                           
                                        </div>                                                                                                                                  
                                        
                                        
                                    </div>
                                </div>
                            </div>

                            
                        </tr>    

                        
                        
                        @endif

                       
                            
                        @endforeach
                        {{-- <tr>
                            <td>{{ $recursMobils->links() }}
                            </td>
                        </tr> --}}
                        
                    
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

                        @if ($recursMobil->estat == 'espera')
                            <tr>
                                <td>O</td>
                                <td> {{ $recursMobil->tipusRecurs->tipus }} </td>
                                <td> {{ $recursMobil->codi }} </td>
                                <td> - </td>
                                                                        
                            </tr>    
                        
                            
                        @endif

                                        
                        @endforeach
                    
                    </tbody>
                </table>
                
            </div>


           
          </div>
        </div>
      </div>

        
    
@endsection
