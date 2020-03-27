@extends('templates.master3')

@section('titulo')
Alertants
@endsection

@section('principal')
<form id="filtros-alertants" action="{{action('AlertantController@index')}}" method="get" class="mb-3 w-100 d-flex flex-wrap justify-content-between">
    <select class="form-control col-4" name="tipus_selected" id="tipus_selected">
        @foreach ($tipus_list as $tipus)
        @if($tipus->id == $tipus_selected)
            <option selected value="{{$tipus->id}}">{{$tipus->tipus}}</option>
        @else
            <option  value="{{$tipus->id}}">{{$tipus->tipus}}</option>
        @endif
        @endforeach

    </select>
    <div id="buscador-alertants" class="d-flex">
            <input class="form-control" value="{{$search}}" type="text" name="search" placeholder="introduce ID o nombre de alertante">
            <button type="submit" class="ml-3 btn btn-primary ">BUSCAR</button>  
    </div>
</form>

    @if(count($alertants)==0)
        <div class="alert alert-info" role="alert">
            No hi ha cap alertant
        </div>
    @else
    <div id="alertants" class="container row rows-col-3 row-cols-md-2 ">
        @foreach ($alertants as $alertant)
            <div class="alertant mr-3 mb-3 col-4 border p-4 d-flex flex-column w-40">
                <div class="d-flex pb-3 justify-content-between ">
                    <img class="mr-2" width="50em" src="{{asset('img/hospital.svg')}}" alt="">
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
    @endif

{{ $alertants->appends(['search'=>$search, 'tipus_selected'=>$tipus_selected])->links() }}

<script>
    $(document).on('change', 'select#tipus_selected', function (e) {
        $(this).closest('form').submit();
    });
</script>
@endsection
