@extends('templates.master')
@section('titulo')NOVA INCIDENCIA @endsection
@section('principal')

<div class="card card-formulari">
    <div class="card-header card-header-formulari ">
        <h2>INCIDENCIA</h2>
    </div>

    <form action="{{ action('IncidenciaController@store')}}" method="post">
    @csrf

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
                            <label for="dataIncidencia" style="width:100px">Data</label>
                            <input type="date" name="dataIncidencia" id="dataIncidencia" style="border-radius:10px; margin-left:35px; ; width:300px;">
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
                            <label for="horaIncidencia">Hora</label>
                            <input type="time" name="horaIncidencia" id="horaIncidencia" style="border-radius:10px; margin-left:100px; ; width:300px;">
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
                                <option value="" selected>Selecciona el tipus</option>
                                <@foreach ($tipusIncident as $tipus)
                                    <option value="{{ $tipus->id }}"> {{ $tipus->tipus }} </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col-md-6 col-sm-4">
                            {{-- MUNICIPI --}}
                            <label for="municipiIncidencia">Municipi</label>
                            <select name="municipiIncidencia" id="municipiIncidencia" style="border-radius:10px; margin-left:100px; ; width:300px;">
                                    <option value="">Selecciona un municipi</option>
                            </select>
                        </div>
                    </div>

                    {{-- ADREÇA I COMPLEMENT DE LA ADREÇA --}}

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="adreçaIncidencia">Adreça</label>
                            <input type="text" name="adreçaIncidencia" id="adreçaIncidencia" style="border-radius:10px; margin-left:85px; ; width:300px;" value="">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="indicacionsIncidencia">Indicacions</label>
                            <input type="text" name="indicacionsIncidencia" id="indicacionsIncidencia" style="border-radius:10px; margin-left:85px; ; width:300px;" value="">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="telefonIncidencia">Telefon</label>
                            <input type="text" name="telefonIncidencia" id="telefonIncidencia" style="border-radius:10px; margin-left:85px; ; width:300px;" value="">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="estatIncidencia">Estat </label>
                            <select name="estatIncidencia" id="estatIncidencia" style="border-radius:10px; margin-left:85px; ; width:100px;">
                                <option value="1" selected>Activa</option>
                                <option value="2">Inactiva</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="localitzacioIncidencia">Localitzacio</label>
                            <input type="text" name="localitzacioIncidencia" id="localitzacioIncidencia" style="border-radius:10px; margin-left:55px; ; width:800px;" value="">
                        </div>
                    </div>

                    <div class="form-row">
                        {{-- DESCRIPCIO --}}
                        <div class="form-group col-md-4 col-sm-4">
                            <label for="descripcioIncidencia">Descripcio</label>
                            <textarea name="descripcioIncidencia" id="descripcioIncidencia" cols="120" rows="3" style="border-radius:10px;" value=""></textarea>
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
                                <option value="" selected>Selecciona el tipus</option>
                                <@foreach ($tipusAlertant as $tipus)
                                    <option value="{{ $tipus->id }}"> {{ $tipus->tipus }} </option>
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
                    <div class="afectat p-5">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="tenir_tarjeta1">Te tarjeta S.S ?</label>
                                <select name="tenir_tarjeta1" id="tenir_tarjeta1" style="border-radius:10px; margin-left:100px; ; width:300px;" class="tenirTarjeta">
                                    <option value="1" selected>Si</option>
                                    <option value="0">No</option>
                                </select>
                            </div>

                            <div class="form-group col-md-6">
                                <div  id="cip1">
                                    <label for="CipAfectat1">CIP</label>
                                    <input type="text" name="CipAfectat1" id="CipAfectat1" style="border-radius:10px; margin-left:85px; ; width:300px;" value="">
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="telefonAfectat1">Telefon</label>
                                <input type="text" name="telefonAfectat1" id="telefonAfectat1" style="border-radius:10px; margin-left:150px; ; width:300px;" value="">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="nomAfectat1">Nom</label>
                                <input type="text" name="nomAfectat1" id="nomAfectat1" style="border-radius:10px; margin-left:150px; ; width:300px;" value="">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="cognomAfectat1">Cognom</label>
                                <input type="text" name="cognomAfectat1" id="cognomAfectat1" style="border-radius:10px; margin-left:150px; ; width:300px;" value="">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="sexeAfectat1">Sexe</label>
                                <select name="sexeAfectat1" id="sexeAfectat1" style="border-radius:10px; margin-left:100px; ; width:100px;">
                                    <option value="" selected>Selecciona</option>
                                    <option value="Home">Home</option>
                                    <option value="Dona">Dona</option>
                                    <option value="Altres">Altres</option>
                                </select>
                            </div>

                            <div class="form-group col-md-4">
                                <label for="edatAfectat1">Edat</label>
                                <input type="number" name="edatAfectat1" id="edatAfectat1" style="border-radius:10px; margin-left:50px; ; width:50px;" value="">
                            </div>
                        </div>

                        <div class="form-row">
                            {{-- PROVINCIA AFECTAT --}}
                            <div class="form-group col-md-3">
                                <label for="provinciaAfectat1">Provincia</label>
                                <select name="provinciaAfectat1" id="provinciaAfectat1" style="border-radius:10px; margin-left:50px; ; width:130px;" class="provinciaAfectat provincia">
                                </select>
                            </div>

                            {{-- COMARCA AFECTAT --}}
                            <div class="form-group col-md-4 col-sm-4">
                                <label for="comarcaAfectat1" style="margin-left:10px;">Comarca</label>
                                <select name="comarcaAfectat1" id="comarcaAfectat1" style="border-radius:10px; margin-left:60px;  width:180px;" class="comarcaAfectat">
                                    <option value="">Selecciona una comarca</option>
                                </select>
                            </div>

                            {{-- MUNICIPI AFECTAT--}}
                            <div class="form-group col-md-5 col-sm-4">
                                <label for="municipiAfectat1">Municipi</label>
                                <select name="municipiAfectat1" id="municipiAfectat1" style="border-radius:10px; margin-left:70px; ; width:290px;">
                                    <option value="">Selecciona un municipi</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-center card-subbody-formulari p-4">
                    <input type="hidden" id="numAfectats" name="numAfectats" value="1">
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
                <div class="card-subbody-formulari recursos">
                    <div class="recurs">
                        {{-- TIPUS I CODI DE RECURS MOBIL --}}
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="tipusRecurs1">Tipus</label>
                                <select name="tipusRecurs1" id="tipusRecurs1" style="border-radius:10px; margin-left:85px; ; width:200px;" class="tipusRecurs">
                                    <option value="0" selected>Selecciona el tipus</option>
                                </select>
                            </div>

                            <div class="form-group col-md-4">
                                <label for="CodiRecurs1">Codi</label>
                                <select name="CodiRecurs1" id="CodiRecurs1" style="border-radius:10px; margin-left:85px; ; width:200px;">
                                    <option value="">Selecciona un codi</option>
                                </select>
                            </div>
                        </div>

                        {{-- HORES DEL RECURS MOBIL --}}
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="hActivacio1">Hora d'Activació</label>
                                <input type="time" name="hActivacio1" id="hActivacio1" style="border-radius:10px; margin-left:85px; ; width:100px;">
                            </div>

                            <div class="form-group col-md-4">
                                <label for="hMovilitzacio1">Hora de Movilització</label>
                                <input type="time" name="hMovilitzacio1" id="hMovilitzacio1" style="border-radius:10px; margin-left:85px; ; width:100px;">
                            </div>

                            <div class="form-group col-md-4">
                                <label for="hAssistencia1">Hora d'Assistencia</label>
                                <input type="time" name="hAssistencia1" id="hAssistencia1" style="border-radius:10px; margin-left:85px; ; width:100px;">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="hTransport1">Hora de Transport</label>
                                <input type="time" name="hTransport1" id="hTransport1" style="border-radius:10px; margin-left:85px; ; width:80px;">
                            </div>

                            <div class="form-group col-md-4">
                                <label for="hArribada1">Hora d'Arribada al Hospital</label>
                                <input type="time" name="hArribada1" id="hArribada1" style="border-radius:10px; margin-left:85px; ; width:50px;">
                            </div>

                            <div class="form-group col-md-4">
                                <label for="hTransferencia1">Hora de Transferencia</label>
                                <input type="time" name="hTransferencia1" id="hTransferencia1" style="border-radius:10px; margin-left:85px; ; width:100px;">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="hFinalització1">Hora de Finalització</label>
                                <input type="time" name="hFinalització1" id="hFinalització1" style="border-radius:10px; margin-left:85px; ; width:100px;">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-center card-subbody-formulari p-4">
                    <input type="hidden" id="numRecursos" name="numRecursos" value="1">
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
        <a href="{{ url('/incidencia') }}"><div class="btn rounded-pill text-uppercase bg-white px-5 ml-4" style="border: 1px solid #1C687D; color: #1C687D;" type="button">Cancelar</div></a>
    </div>

    </form>
</div>

@endsection
