@extends('templates.master3')

@section('titulo')
Recursos Mòbils
@endsection

@section('principal')

<div class="card card-formulari">
    <div class="card-header card-header-formulari ">
        <h2>RECURS MOBIL</h2>
    </div>

    <form action="{{ action('RecursMobilController@store')}}" method="post">
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
                       
                        <div class="form-group ">
                            
                            <div class="row">
                                <div class="col-sm-8">
                                  <div class="card" style="border:none; background-color:#eee;">
                                    <div class="card-body">
                                        <table>
                                            <thead>
                                                <th scope="col">imagen</th>
                                                <th scope="col">imagen</th>
                                                <th scope="col">imagen</th>
                                                <th scope="col">imagen</th>                                    
                                            </thead>
                                            <tbody>
                    
                                            <tr>
                                                    
                                                
                                            @foreach ($tipusRecursos as $tipusRecurs)
                                                
                                              
                                                    <td><label for="tipus" >{{ $tipusRecurs->tipus }}</label></td>
                                            
                                            @endforeach
                    
                                            </tr>
                    
                                            <tr>
                    
                                            @foreach ($tipusRecursos as $tipusRecurs)
                                                                            
                                               <td> <input type="radio" name="tipus" id="tipus" class="mr-5" value="{{ $tipusRecurs->id }}" ></td>
                                                                            
                                            @endforeach
                    
                                            </tr>
                    
                    
                                            </tbody>
                                            </table>
                                    </div>
                                  </div>
                                </div>

                                <div class="col-sm-4">
                                  <div class="card" style="border:none; background-color:#eee;" >
                                    <div class="card-body">
                                        <div class="form-group col-md-3">
                                            <label for="codi" >Codi</label>
                                            <br>
                                            <input type="text" name="codi" id="codi" style="border-radius:10px; width:200px;">
                                        </div>
                                    </div>
                                  </div>
                                </div>
                            </div>
                               
                        </div>

                    </div>
                </div>
                
            </div>
        </div>

    <div class="card-footer text-muted text-center">
        <button class="btn btn-primary" type="submit">Guardar</button>        
        <a class="btn btn-primary" href=" {{ url('/rmobils') }} " role="button">CANCELAR</a>
    </div>

    </form>
</div>        
    
@endsection
