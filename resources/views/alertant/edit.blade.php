@extends('templates.master3')

@section('titulo')
Editar alertant
@endsection


@section('principal')
<h2>Editar alertant</h2>
<form method="post" action="{{action('AlertantController@update', $alertant)}}">
  {{ method_field('put') }}
  {{ csrf_field() }}
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


    <div class="form-group row">
      <div class="col-sm-10">
        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="{{url('/alertant')}}" class="btn btn-secondary">Cancel·lar</a>

      </div>
    </div>
  </form>

@endsection
