@extends('templates.master3')

@section('titulo')
    Alertants
@endsection

@section('principal')
<div id="filtros-alertants" class="row mb-3 w-100 d-flex justify-content-between">
    <select name="tipus_alertants" id="tipus_alertants">
        <option value="0">Tots els alertants</option>
        <option value="0"></option>
        <option value="0"></option>

    </select>
    <div id="buscador-alertants" class="d-flex">
        <input type="text" name="search" placeholder="introduce ID o nombre de alertante">
        <button class="btn btn-primary ">BUSCAR</button>
    </div>
</div>
<div id="alertants" class="row rows-col-3 row-cols-md-2 ">
    <div class="alertant mr-3 mb-3 col-mb-4 border p-4 d-flex flex-column w-40">
        <div class="d-flex pb-3 justify-content-between ">
            <img src="" alt="">
            <div class="d-flex  flex-column">
                    <div><strong>Anna Black</strong></div>
                    <div>Metge de capçalera</div>
            </div>
        </div>
        <div class="d-flex justify-content-between">
            <button class="btn btn-primary">Veure perfil</button>
            <button class="btn btn-secondary">Canviar dades</button>
        </div>
    </div>
    <div class="alertant mr-3 mb-3 col-mb-4 border p-4 d-flex flex-column w-40">
        <div class="d-flex pb-3 justify-content-between ">
            <img src="" alt="">
            <div class="d-flex  flex-column">
                    <div><strong>Anna Black</strong></div>
                    <div>Metge de capçalera</div>
            </div>
        </div>
        <div class="d-flex justify-content-between">
            <button class="btn btn-primary">Veure perfil</button>
            <button class="btn btn-secondary">Canviar dades</button>
        </div>
    </div>
    <div class="alertant mr-3 mb-3 col-mb-4 border p-4 d-flex flex-column w-40">
        <div class="d-flex pb-3 justify-content-between ">
            <img src="" alt="">
            <div class="d-flex  flex-column">
                    <div><strong>Anna Black</strong></div>
                    <div>Metge de capçalera</div>
            </div>
        </div>
        <div class="d-flex justify-content-between">
            <button class="btn btn-primary">Veure perfil</button>
            <button class="btn btn-secondary">Canviar dades</button>
        </div>
    </div>
    <div class="alertant mr-3 mb-3 col-mb-4 border p-4 d-flex flex-column w-40">
        <div class="d-flex pb-3 justify-content-between ">
            <img src="" alt="">
            <div class="d-flex  flex-column">
                    <div><strong>Anna Black</strong></div>
                    <div>Metge de capçalera</div>
            </div>
        </div>
        <div class="d-flex justify-content-between">
            <button class="btn btn-primary">Veure perfil</button>
            <button class="btn btn-secondary">Canviar dades</button>
        </div>
    </div>
    
    
    
    
</div>

@endsection