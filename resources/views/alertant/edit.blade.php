@extends('templates.master')

@section('titulo')
Editar alertant
@endsection

@section('principal')

<div class="card card-formulari">
    <div class="card-header card-header-formulari ">
        <h2>ALERTANT</h2>
    </div>

    <form method="post" action="{{action('AlertantController@update', $alertant)}}">
        {{ method_field('put') }}
        {{ csrf_field() }}

        <div id="accordion" class="card-body card-body-formulari">
                <div class="card-subheader card-subheader-formulari" id="headingOne" data-toggle="collapse"
                    data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    <h3 class="mb-0">Editar alertant</h3>
                </div>

                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                    <div class="card-subbody card-subbody-formulari">

                        <div class="form-group row">
                            <label for="nom" class="col-sm-2 col-form-label">Nom</label>
                            <div class="col-sm-10">
                                <input type="text" value="{{$alertant->nom}}" placeholder="Nom de l'alertant" name="nom" class="form-control" id="nom_alertant">
                            </div>
                        </div>
                          <div class="form-group row">
                            <label for="telefon" class="col-sm-2 col-form-label">Telefon</label>
                            <div class="col-sm-10">
                              <input minlength="9" maxlength="9" pattern="[0-9]{9}" type="tel" value="{{$alertant->telefon}}" name="telefon" class="form-control" id="telefon_alertant">
                            </div>
                          </div>
                          <div class="form-group row">
                              <label for="adreca" class="col-sm-2 col-form-label">Adreça</label>
                              <div class="col-sm-10">
                                <input type="text" value="{{$alertant->adreca}}" name="adreca" class="form-control" id="adreca_alertant">
                              </div>
                          </div>
                          <div class="form-group row">
                              <label for="municipi" class="col-sm-2 col-form-label">Municipi</label>
                              <div class="col-sm-10">
                                <select class="form-control" name="municipi" id="municipi_alertant">
                                  @foreach($municipis as $municipi)
                                  @if($municipi->id == $alertant->municipi->id)
                                  <option selected value="{{$alertant->municipi->id}}">{{$municipi->nom}}</option>
                                  @else
                                  <option value="{{$alertant->municipi->id}}">{{$municipi->nom}}</option>
                                  @endif
                                  @endforeach
                                </select>

                              </div>
                          </div>
                          <div class="form-group row">
                              <label for="tipus" class="col-sm-2 col-form-label">Tipus</label>
                              <div class="col-sm-10">
                                <select class="form-control" name="tipus_alertant" id="tipus_alertant">
                                  @foreach($all_tipus as $tipus)
                                  @if($tipus->id == $alertant->tipus->id)
                                  <option selected value="{{$tipus->id}}">{{$tipus->tipus}}</option>
                                  @else
                                  <option value="{{$tipus->id}}">{{$tipus->tipus}}</option>
                                  @endif
                                  @endforeach

                                </select>
                              </div>
                          </div>
                    </div>
                </div>
        </div>

        <div class="card-footer text-muted text-center p-3" style="border-top: 1px solid #1C687D;">
            <button class="btn rounded-pill text-uppercase px-5 text-white" type="submit" style="background-color: #1C687D;">Guardar</button>
            <a href="{{ url('/alertant') }}"><div class="btn rounded-pill text-uppercase bg-white px-5 ml-4" style="border: 1px solid #1C687D; color: #1C687D;" type="button">Cancelar</div></a>
        </div>
    </form>
</div>


@endsection
