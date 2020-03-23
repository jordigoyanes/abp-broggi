@extends('templates.master3')

@section('titulo')
Alertants
@endsection

@section('principal')
<div id="filtros-alertants" class="mb-3 w-100 d-flex flex-wrap justify-content-between">
    <select name="tipus_alertants" id="tipus_alertants">
        <option value="0">Tots els alertants</option>
        <option value="0"></option>
        <option value="0"></option>

    </select>
    <div id="buscador-alertants" class="d-flex">
        <form action="{{action('AlertantController@index')}}" method="get">
            <input value="{{$search}}" type="text" name="search" placeholder="introduce ID o nombre de alertante">
            <button type="submit" class="ml-3 btn btn-primary ">BUSCAR</button>
        </form>
    </div>
</div>
<div id="alertants" class="row rows-col-3 row-cols-md-2 ">
@foreach ($alertants as $alertant)
    <div class="alertant mr-3 mb-3 col-4 border p-4 d-flex flex-column w-40">
        <div class="d-flex pb-3 justify-content-between ">
            <img src="" alt="">
            <div class="d-flex  flex-column">
                <div><strong>{{$alertant->nom}}</strong></div>
                <div>{{$alertant->tipus->tipus}}</div>
            </div>
        </div>
        <div class="d-flex justify-content-between">
            <button class="btn btn-primary">Veure perfil</button>
            <button class="btn btn-secondary">Canviar dades</button>
        </div>
    </div>
@endforeach
</div>
{{ $alertants->appends(['search'=>$search])->links() }}
@endsection
