@extends('templates.master')
@section('titulo')Editar incidencia @endsection
@section('principal')

<div class="card card-formulari">
    <div class="card-header card-header-formulari ">
        <h2>INCIDENCIA</h2>
    </div>

    <form action="{{ action('IncidenciaController@update', $incidencia->id)}}" method="post">
        {{ method_field('put') }}
        {{ csrf_field() }}

    <div id="accordion" class="card-body card-body-formulari">

        {{-- **************Dades incidencia******************** --}}
        <div>
            <div class="card-subheader card-subheader-formulari" id="headingOne" data-toggle="collapse"
                data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                <h3 class="mb-0">Dades de la incidencia</h3>
            </div>

            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                <div class="card-subbody card-subbody-formulari">

                    <div class="form-row">
                        {{-- DATA --}}
                        <div class="form-group col-md-6 col-sm-4">
                            <label for="dataIncidenciaEdit" style="width:100px">Data</label>
                            <input type="date" name="dataIncidencia" id="dataIncidenciaEdit" style="border-radius:10px; margin-left:35px; ; width:300px;" value="{{$incidencia->data}}">
                        </div>

                        {{-- PROVINCIA --}}
                        <div class="form-group col-md-6 col-sm-4 form-inline">
                            <label for="provinciaIncidencia">Provincia</label>
                            <select name="provinciaIncidencia" id="provinciaIncidencia" style="border-radius:10px; margin-left:94px; ; width:300px;">
                                <option value=''>Selecciona una provincia</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-row">
                        {{-- HORA --}}
                        <div class="form-group col-md-6 col-sm-4">
                            <label for="horaIncidenciaEdit">Hora</label>
                            <input type="time" name="horaIncidencia" id="horaIncidenciaEdit" style="border-radius:10px; margin-left:100px; ; width:300px;" value="{{$incidencia->hora}}">
                        </div>

                        {{-- COMARCA --}}
                        <div class="form-group col-md-6 col-sm-4">
                            <label for="comarcaIncidencia">Comarca</label>
                            <select name="comarcaIncidencia" id="comarcaIncidencia" style="border-radius:10px; margin-left:94px; ; width:300px;">
                                <option value="">Selecciona una comarca</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6 col-sm-4">
                            {{-- TIPUS --}}
                            <label for="tipusIncidencia">Tipus</label>
                            <select name="tipusIncidencia" id="tipusIncidencia" style="border-radius:10px; margin-left:95px; ; width:300px;">
                                <option value="" @if($incidencia->tipus_incident_id) selected @endif>Selecciona un tipus</option>
                                @foreach ($tipusIncident as $tipus)
                                    @if($incidencia->tipus_incident_id == $tipus->id)
                                        <option value="{{$tipus->id}}" selected> {{ $tipus->tipus }}</option>
                                    @else
                                    <option value="{{$tipus->id}}"> {{ $tipus->tipus }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col-md-6 col-sm-4">
                            {{-- MUNICIPI --}}
                            <label for="municipiIncidencia">Municipi</label>
                            <select name="municipiIncidencia" id="municipiIncidencia" style="border-radius:10px; margin-left:100px; ; width:300px;">
                                @if($incidencia->municipi)
                                    <option value="{{$incidencia->municipi->id}} " selected>{{$incidencia->municipi->nom}} </option>
                                @else
                                    <option value="">Selecciona un municipi</option>
                                @endif
                            </select>
                        </div>
                    </div>

                    {{-- ADREÇA I COMPLEMENT DE LA ADREÇA --}}

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="adreçaIncidencia">Adreça</label>
                            <input type="text" name="adreçaIncidencia" id="adreçaIncidencia" style="border-radius:10px; margin-left:85px; ; width:300px;" value="{{$incidencia->adreca}}">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="indicacionsIncidencia">Indicacions</label>
                            <input type="text" name="indicacionsIncidencia" id="indicacionsIncidencia" style="border-radius:10px; margin-left:85px; ; width:300px;" value="{{$incidencia->complement_adreca}}">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="telefonIncidencia">Telefon</label>
                            <input type="text" name="telefonIncidencia" id="telefonIncidencia" style="border-radius:10px; margin-left:85px; ; width:300px;" value="{{$incidencia->telefon_alertant}}">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="estatIncidencia">Estat </label>
                            <select name="estatIncidencia" id="estatIncidencia" style="border-radius:10px; margin-left:85px; ; width:100px;">
                                <option value="1" @if($incidencia->estats_incidencia_id ==1 )selected @endif>Activa</option>
                                <option value="3" @if($incidencia->estats_incidencia_id ==3 )selected @endif>Inactiva</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="localitzacioIncidencia">Localitzacio</label>
                            <input type="text" name="localitzacioIncidencia" id="localitzacioIncidencia" style="border-radius:10px; margin-left:55px; ; width:800px;" value="{{$incidencia->localitzacio}}">
                        </div>
                    </div>

                    <div class="form-row">
                        {{-- DESCRIPCIO --}}
                        <div class="form-group w-100">
                            <label for="descripcioIncidencia">Descripcio</label>
                            <textarea name="descripcioIncidencia" id="descripcioIncidencia" class="w-100 p-2" rows="3" style="border-radius:10px;">{{$incidencia->descripcio}}</textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- **************Dades alertant******************** --}}
        <div>
            <div class="card-subheader card-subheader-formulari" id="headingTwo" data-toggle="collapse"
                data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                <h3 class="mb-0">Dades de l'alertant</h3>
            </div>

            <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordion">
                <div class="card-subbody card-subbody-formulari">

                    <div class="form-row">
                        <div class="form-group col-md-6 col-sm-4">
                            {{-- TIPUS  --}}
                            <label for="tipusAlertant">Tipus d'Alertant</label>
                            <select name="tipusAlertant" id="tipusAlertant" style="border-radius:10px; margin-left:95px; ; width:300px;">
                                <option value="" @if($incidencia->tipus_alertant_id) selected @endif>Selecciona el tipus</option>
                                @foreach ($tipusAlertant as $tipus)
                                    @if($incidencia->tipus_alertant_id == $tipus->id)
                                        <option value="{{ $tipus->id }}" selected> {{ $tipus->tipus }} </option>
                                    @else
                                        <option value="{{$tipus->id}}"> {{ $tipus->tipus }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>

                        <div class="centre_san_si">
                            {{-- CENTRE SANITARI EN EL CAS DE QUE L'ALERTANT SIGUI AQUEST --}}
                            <div class="form-group d-flex centre_san_si">
                                <label for="centreSanitari">Nom del Centre Sanitari</label>
                                <select name="centreSanitari" id="centreSanitari" style="border-radius:10px; margin-left:60px;  width:180px;">
                                    <option value="">Selecciona una Centre</option>
                                </select>
                            </div>
                        </div>

                    </div>

                    <div class="centre_san_no">

                        <div class="form-row">

                            <div class="form-group col-md-6">
                                <label for="nomAlertant">Nom del Alertant</label>
                                <input type="text" name="nomAlertant" id="nomAlertant" style="border-radius:10px; margin-left:85px; ; width:300px;">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="cognomAlertant">Cognom del Alertant</label>
                                <input type="text" name="cognomAlertant" id="cognomAlertant" style="border-radius:10px; margin-left:50px; ; width:200px;">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="adreçaAlertant">Adreça del Alertant</label>
                                <input type="text" name="adreçaAlertant" id="adreçaAlertant" style="border-radius:10px; margin-left:50px; ; width:300px;">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="telefonAlertant">Telefon del Alertant</label>
                                <input type="text" name="telefonAlertant" id="telefonAlertant" style="border-radius:10px; margin-left:50px; ; width:300px;">
                            </div>
                        </div>

                        <div class="form-row">
                            {{-- PROVINCIA ALERTANT --}}
                            <div class="form-group col-md-4">
                                <label for="provinciaAlertant">Provincia</label>
                                <select name="provinciaAlertant" id="provinciaAlertant" style="border-radius:10px; margin-left:50px; ; width:130px;">
                                    <option value="">Selecciona una provincia</option>
                                </select>
                            </div>

                            {{-- COMARCA --}}
                            <div class="form-group col-md-4">
                                <label for="comarcaAlertant">Comarca</label>
                                <select name="comarcaAlertant" id="comarcaAlertant" style="border-radius:10px; margin-left:60px;  width:180px;">
                                    <option value="">Selecciona una comarca</option>
                                </select>
                            </div>

                            {{-- MUNICIPI ALERTANT--}}
                            <div class="form-group col-md-4 col-sm-4">
                                <label for="municipiAlertant">Municipi</label>
                                <select name="municipiAlertant" id="municipiAlertant" style="border-radius:10px; margin-left:70px; ; width:200px;">
                                    <option value="">Selecciona un municipi</option>
                            </select>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>

        {{-- **************Dades afectats******************** --}}
        <div>
            <div class="card-subheader card-subheader-formulari" id="headingThree" data-toggle="collapse"
                data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                <h3 class="mb-0">Dades dels afectats</h3>
            </div>

            <div id="collapseThree" class="collapse show" aria-labelledby="headingThree" data-parent="#accordion">
                <div class="afectats card-subbody-formulari p-0">
                    @php $i=1; @endphp
                    @foreach ($afectats as $afectat)
                    <div class="afectat p-5" style='border-top: solid 1px #1C687D'>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="tenir_tarjeta{{$i}}">Te tarjeta S.S ?</label>
                                <select name="tenir_tarjeta{{$i}}" id="tenir_tarjeta{{$i}}" style="border-radius:10px; margin-left:100px; ; width:300px;" class="tenirTarjeta">
                                    <option value="1" selected>Si</option>
                                    <option value="0">No</option>
                                </select>
                            </div>

                            <div class="form-group col-md-6">
                                <div class="" id="cip1">
                                    <label for="CipAfectat{{$i}}">CIP</label>
                                    <input type="text" name="CipAfectat{{$i}}" id="CipAfectat{{$i}}" style="border-radius:10px; margin-left:85px; ; width:300px;" value="@if($afectat->cip){{$afectat->cip}}@endif">
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="telefonAfectat{{$i}}">Telefon</label>
                                <input type="text" name="telefonAfectat{{$i}}" id="telefonAfectat{{$i}}" style="border-radius:10px; margin-left:150px; ; width:300px;" value="@if($afectat->telefon){{$afectat->telefon}}@endif">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="nomAfectat{{$i}}">Nom</label>
                                <input type="text" name="nomAfectat{{$i}}" id="nomAfectat{{$i}}" style="border-radius:10px; margin-left:150px; ; width:300px;" value="@if($afectat->nom){{$afectat->nom}}@endif">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="cognomAfectat{{$i}}">Cognom</label>
                                <input type="text" name="cognomAfectat{{$i}}" id="cognomAfectat{{$i}}" style="border-radius:10px; margin-left:150px; ; width:300px;" value="@if($afectat->cognoms){{$afectat->cognoms}}@endif">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="sexeAfectat{{$i}}">Sexe</label>
                                <select name="sexeAfectat{{$i}}" id="sexeAfectat{{$i}}" style="border-radius:10px; margin-left:100px; ; width:100px;">
                                    <option value="" @if(!$afectat->sexe) selected @endif>Selecciona</option>
                                    <option value="Home" @if($afectat->sexe == "Home") selected @endif>Home</option>
                                    <option value="Dona" @if($afectat->sexe == "Dona") selected @endif>Dona</option>
                                    <option value="Altres" @if($afectat->sexe == "Altres") selected @endif>Altres</option>
                                </select>
                            </div>

                            <div class="form-group col-md-4">
                                <label for="edatAfectat{{$i}}">Edat</label>
                                <input type="number" name="edatAfectat{{$i}}" id="edatAfectat{{$i}}" style="border-radius:10px; margin-left:50px; ; width:50px;" value="@if($afectat->edat){{$afectat->edat}}@endif">
                            </div>
                        </div>

                        <div class="form-row">
                            {{-- PROVINCIA AFECTAT --}}
                            <div class="form-group col-md-3">
                                <label for="provinciaAfectat{{$i}}">Provincia</label>
                                <select name="provinciaAfectat{{$i}}" id="provinciaAfectat{{$i}}" style="border-radius:10px; margin-left:50px; ; width:130px;" class="provinciaAfectat provincia">
                                </select>
                            </div>

                            {{-- COMARCA AFECTAT --}}
                            <div class="form-group col-md-4 col-sm-4">
                                <label for="comarcaAfectat{{$i}}" style="margin-left:10px;">Comarca</label>
                                <select name="comarcaAfectat{{$i}}" id="comarcaAfectat{{$i}}" style="border-radius:10px; margin-left:60px;  width:180px;" class="comarcaAfectat">
                                    <option value="">Selecciona una comarca</option>
                                </select>
                            </div>

                            {{-- MUNICIPI AFECTAT--}}
                            <div class="form-group col-md-5 col-sm-4">
                                <label for="municipiAfectat{{$i}}">Municipi</label>
                                <select name="municipiAfectat{{$i}}" id="municipiAfectat{{$i}}" style="border-radius:10px; margin-left:70px; ; width:290px;">
                                    @if($afectat->municipi)
                                        <option value="{{$afectat->municipis_id}}" selected>{{$afectat->municipi->nom}} </option>
                                    @else
                                        <option value="">Selecciona un municipi</option>
                                    @endif
                                </select>
                            </div>
                        </div>
                    </div>
                    @php $i++; @endphp
                    @endforeach
                </div>
                <div class="d-flex justify-content-center card-subbody-formulari p-4">
                <input type="hidden" id="numAfectats" name="numAfectats" value="{{count($afectats)}}">
                    <p class="my-auto mr-3 afegirp">Afegir afectat</p>
                    <button class="afegir rounded-circle border-0 d-flex flex-row align-items-center btn-sm" id="afegirAfectat" type="button">
                        <span class="align-self-center my-auto text-white">+</span>
                    </button>
                </div>
            </div>
        </div>

        {{-- **************Dades recursos mobils******************** --}}
        <div>
            <div class="card-subheader card-subheader-formulari" id="headingFour" data-toggle="collapse"
                data-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
                <h3 class="mb-0">Dades dels recursos mobils</h3>
            </div>

            <div id="collapseFour" class="collapse show" aria-labelledby="headingFour" data-parent="#accordion">
                <div class="card-subbody-formulari recursos p-0">
                    @php $i=1; @endphp
                    @foreach($recursos as $recurs)
                    @php
                        $hores = DB::table('incidencies_has_recursos')->where('recursos_id', $recurs->id)
                                                                      ->where('incidencies_id', $incidencia->id)->first();
                    @endphp
                    <div class="recurs p-5" style='border-top: solid 1px #1C687D'>
                        {{-- TIPUS I CODI DE RECURS MOBIL --}}
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="tipusRecurs{{$i}}">Tipus</label>
                                <select name="tipusRecurs{{$i}}" id="tipusRecurs{{$i}}" style="border-radius:10px; margin-left:85px; ; width:200px;" class="tipusRecurs">
                                    <option value="0" selected>Selecciona el tipus</option>
                                </select>
                            </div>

                            <div class="form-group col-md-4">
                                <label for="CodiRecurs{{$i}}">Codi</label>
                                <select name="CodiRecurs{{$i}}" id="CodiRecurs{{$i}}" style="border-radius:10px; margin-left:85px; ; width:200px;">
                                    @if($recurs->codi)
                                        <option value="{{$recurs->codi}}" selected>{{$recurs->codi}}</option>
                                    @else
                                        <option value="">Selecciona un municipi</option>
                                    @endif
                                </select>
                            </div>
                        </div>

                        {{-- HORES DEL RECURS MOBIL --}}
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="hActivacio{{$i}}">Hora d'Activació</label>
                                <input type="time" name="hActivacio{{$i}}" id="hActivacio{{$i}}" style="border-radius:10px; margin-left:85px; ; width:100px;" value="@if($hores->hora_acitvacio != null){{ $hores->hora_acitvacio }}@endif">
                            </div>

                            <div class="form-group col-md-4">
                                <label for="hMovilitzacio{{$i}}">Hora de Movilització</label>
                                <input type="time" name="hMovilitzacio{{$i}}" id="hMovilitzacio{{$i}}" style="border-radius:10px; margin-left:85px; ; width:100px;"value="@if($hores->hora_mobilitzacio != null){{ $hores->hora_mobilitzacio }}@endif">
                            </div>

                            <div class="form-group col-md-4">
                                <label for="hAssistencia{{$i}}">Hora d'Assistencia</label>
                                <input type="time" name="hAssistencia{{$i}}" id="hAssistencia{{$i}}" style="border-radius:10px; margin-left:85px; ; width:100px;" value="@if($hores->hora_assistencia != null){{ $hores->hora_assistencia }}@endif">>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="hTransport{{$i}}">Hora de Transport</label>
                                <input type="time" name="hTransport{{$i}}" id="hTransport{{$i}}" style="border-radius:10px; margin-left:85px; ; width:80px;"value="@if($hores->hora_transport != null){{ $hores->hora_transport }}@endif">
                            </div>

                            <div class="form-group col-md-4">
                                <label for="hArribada{{$i}}">Hora d'Arribada al Hospital</label>
                                <input type="time" name="hArribada{{$i}}" id="hArribada{{$i}}" style="border-radius:10px; margin-left:85px; ; width:50px;"value="@if($hores->hora_arribada_hospital != null){{ $hores->hora_arribada_hospital }}@endif">
                            </div>

                            <div class="form-group col-md-4">
                                <label for="hTransferencia{{$i}}">Hora de Transferencia</label>
                                <input type="time" name="hTransferencia{{$i}}" id="hTransferencia{{$i}}" style="border-radius:10px; margin-left:85px; ; width:100px;"value="@if($hores->hora_transferencia != null){{ $hores->hora_transferencia }}@endif">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="hFinalització{{$i}}">Hora de Finalització</label>
                                <input type="time" name="hFinalització{{$i}}" id="hFinalització{{$i}}" style="border-radius:10px; margin-left:85px; ; width:100px;"value="@if($hores->hora_finalitzacio != null){{ $hores->hora_finalitzacio }}@endif">
                            </div>
                        </div>
                    </div>
                    @php $i++; @endphp
                    @endforeach
                </div>
                <div class="d-flex justify-content-center card-subbody-formulari" >
                    <input type="hidden" id="numRecursos" name="numRecursos" value="{{count($recursos)}}">
                    <p class="my-auto mr-3 afegirp">Afegir recurs</p>
                    <button class="afegir rounded-circle border-0 d-flex flex-row align-items-center btn-sm" id="afegirRecurs" type="button">
                        <span class="align-self-center my-auto text-white">+</span>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="card-footer text-muted text-center p-3" style="border-top: 1px solid #1C687D;">
        <button class="btn rounded-pill text-uppercase px-5 text-white" type="submit" style="background-color: #1C687D;">Guardar</button>
        <button class="btn rounded-pill text-uppercase bg-white px-5 ml-4" href="{{ url('/incidencia') }}" style="border: 1px solid #1C687D; color: #1C687D;" type="button">Cancelar</button>
    </div>

    </form>
</div>

@endsection
