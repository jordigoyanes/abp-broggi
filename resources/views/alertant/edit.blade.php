@extends('templates.master3')

@section('titulo')
Editar alertant
@endsection


@section('principal')
<h2>Editar alertant</h2>
<form>
    <div class="form-group row">
      <label for="nom" class="col-sm-2 col-form-label">Nom</label>
      <div class="col-sm-10">
        <input type="text" value="{{$alertant->nom}}" placeholder="Nom de l'alertant" name="nom" class="form-control" id="nom_alertant">
      </div>
    </div>
    <div class="form-group row">
      <label for="telefon" class="col-sm-2 col-form-label">Telefon</label>
      <div class="col-sm-10">
        <input type="tel" value="{{$alertant->telefon}}" name="telefon" class="form-control" id="telefon_alertant">
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
          <input type="text" value="{{$alertant->municipi->nom}}" name="municipi" class="form-control" id="municipi_alertant">
        </div>
    </div>
    <div class="form-group row">
        <label for="tipus" class="col-sm-2 col-form-label">Tipus</label>
        <div class="col-sm-10">
          <input type="text" value="{{$alertant->tipus->tipus}}" name="tipus" class="form-control" id="tipus_alertant">
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