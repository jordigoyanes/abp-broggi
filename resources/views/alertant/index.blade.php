@extends('templates.master3')

@section('titulo')
Alertants
@endsection

@section('principal')
<form id="filtros-alertants" action="{{action('AlertantController@index')}}" method="get" class="mb w-100 d-flex flex-wrap justify-content-between mb-3">
    <div id="tipus_alertant" class="d-flex flex-row col-3 align-items-center p-0">

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
    <div id="buscador-alertants" class="d-flex col-4">
            <input class="form-control px-4" value="{{$search}}" type="text" name="search" placeholder="Nom de l'alertant" style="border:#1C687D 1px solid; border-radius:20px; color: #1C687D; text-decoration:underline">
            <button type="submit" class="ml-3 btn rounded-circle" style="background: #D7F0F4"><img src="img/search.png" alt="lupa" width="16px"></button>
    </div>
</form>
    @if(count($alertants)==0)
    {{-- <div class="container"> --}}
        <div class="alert alert-info" role="alert">
            No hi ha cap alertant
        </div>
    {{-- </div> --}}
    @else
    {{-- <div class="d-flex justify-content-center">
        {{ $alertants->appends(['search'=>$search, 'tipus_selected'=>$tipus_selected])->links() }}
    </div> --}}
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
                    <a href="{{url('/alertant', $alertant->id)}}" class="btn rounded-0" style="background: #FCC536; color: white;">Veure perfil</a>

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
