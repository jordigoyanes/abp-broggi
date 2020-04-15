@extends('templates.master3')

@section('titulo')
Recursos Mòbils
@endsection

@section('principal')

<div class="card card-formulari">
    <div class="card-header card-header-formulari ">
        <h2>INCIDENCIA</h2>
    </div>

    <form action="{{ action('IncidenciaController@store')}}" method="post">
    @csrf

    <div id="accordion" class="card-body card-body-formulari">



      

        <div>
            <div class="card-subheader card-subheader-formulari" id="headingTwo" data-toggle="collapse"
                data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                <h3 class="mb-0">Recursos mobils</h3>
            </div>

            <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordion">
                <div class="card-subbody card-subbody-formulari">

                    

                    <div class="form-row">                        
                       
                        <div class="form-group col-md-4 form-inline">
                            <div class="card-deck">
                                        
                                    
                                @foreach ($tipusRecursos as $tipusRecurs)
                                
                                <div class="card">
                                    
                                    <div class="card-body">
                                    <label for="BIn" >{{ $tipusRecurs->tipus }}</label>
                                    <input type="radio" name="BIn" id="BIn" class="mr-5" value="{{ $tipusRecurs->id }}" >
                                    </div>
                                    
                                </div>
                                    
                                    
                                    
                                @endforeach
                          
                                
                            </div>
                                
                        </div>

                        <div class="form-group col-md-4">
                            <label for="TelefonAlertant" >Telefon</label>
                            <input type="text" name="TelefonAlertant" id="TelefonAlertant" style="border-radius:10px; width:200px;">
                        </div>

                    </div>
                   
                   
                </div>
            </div>
        </div>

       

       
    <div class="card-footer text-muted text-center">
        <button class="btn btn-primary" type="submit">Guardar</button>
        <button class="btn btn-primary" href="{{ url('/incidencia') }}" >Cancelar</button>
    </div>

    </form>
</div>        
    
@endsection
