@extends('templates.master3')

@section('titulo')
Alertants
@endsection

@section('principal')
<form id="filtros-alertants" action="{{action('AlertantController@index')}}" method="get" class="mb w-100 d-flex flex-wrap justify-content-between mt-3 mb-4">
    <div id="tipus_alertant" class="d-flex flex-row col-lg-3 col-md-4 col-sm-12 align-items-center p-0 mb-md-0 mb-sm-4 m-xs-4">

        {{-- <label class="mr-2 mb-0" for="tipus_selected">Tipus</label> --}}
        <select class="form-control rounded-0 px-4" name="tipus_selected" id="tipus_selected"  style="border:none; border-bottom: #1C687D 1px solid; border-radius:0; color: #1C687D">
            {{-- Falta arreglar aquesta opcio (tots els tipus) --}}
            <option>Tots els tipus</option>
            @foreach ($tipus_list as $tipus)
                @if($tipus->id == $tipus_selected)
                    <option selected value="{{$tipus->id}}">{{$tipus->tipus}}</option>
                @else
                    <option  value="{{$tipus->id}}">{{$tipus->tipus}}</option>

                @endif
            @endforeach

        </select>
    </div>
    <div id="buscador-alertants" class="d-flex col-lg-4 col-md-5 col-sm-12 mt-md-0 mt-xs-4 mx-0 px-0">
            <input class="form-control px-4" value="{{$search}}" type="text" name="search" placeholder="Nom de l'alertant" style="border:#1C687D 1px solid; border-radius:20px; color: #1C687D; text-decoration:underline">
            <button type="submit" class="ml-3 btn rounded-circle" style="background: #D7F0F4"><img src="img/search.png" alt="lupa" width="16px"></button>
    </div>
</form>


    @if(count($alertants)==0)
    <div class="alert alert-info" role="alert">
        No hi ha cap alertant
    </div>
    @else
    <div class="d-flex flex-wrap mx-n2 mt-2 mb-5">
        @foreach ($alertants as $alertant)
            <div class="card m-2 rounded-0 p-2" style="width:379px">
                <div class="card-body d-flex flex-column">
                    <div class="d-flex">
                        <div style="width:50px" class="">
                            <img class="w-100" src="{{asset('img/hospital.svg')}}" alt="">
                        </div>
                        <div class="d-flex flex-column ml-4">
                            <div><strong>{{$alertant->nom}}</strong></div>
                            <div>{{$alertant->tipus->tipus}}</div>
                        </div>
                    </div>
                    <div class="mt-3">
                        <a href="{{url('/alertant', $alertant->id)}}" class="btn rounded-0" style="background: #FCC536; color: white;">Veure perfil</a>
                    </div>
                </div>

            </div>
        @endforeach
    </div>
    @endif

<div class="d-flex justify-content-center">
    {{ $alertants->appends(['search'=>$search, 'tipus_selected'=>$tipus_selected])->links() }}
</div>

<script>
    $(document).on('change', 'select#tipus_selected', function (e) {
        $(this).closest('form').submit();
    });
</script>
@endsection
