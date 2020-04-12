@extends('templates.master3')
@section('titulo')NOVA INCIDENCIA @endsection
@section('principal')

<div class="card card-formulari">
    <div class="card-header card-header-formulari ">
        <h2>INCIDENCIA</h2>
    </div>
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
                            <label for="data">Data</label>
                            <input type="date" name="data" id="data" style="border-radius:10px; margin-left:100px; width:300px;">
                        </div>
                        {{-- PROVINCIA --}}
                        <div class="form-group col-md-6 col-sm-4 form-inline">
                            <input type="radio" name="B" id="B" value="Barcelona" style="margin-right:15px;">
                            <label for="B" style="margin-right:25px;">B</label><br>

                            <input type="radio" name="G" id="G" value="Girona" style="margin-right:15px;">
                            <label for="G" style="margin-right:25px;">G</label><br>

                            <input type="radio" name="L" id="L" value="Lleida" style="margin-right:15px;">
                            <label for="L" style="margin-right:25px;">L</label><br>

                            <input type="radio" name="t" id="T" value="Tarragona" style="margin-right:15px;">
                            <label for="T" style="margin-right:25px;">T</label><br>
                        </div>

                    </div>
                    <div class="form-row">
                        {{-- HORA --}}
                        <div class="form-group col-md-6 col-sm-4">
                            <label for="hora">Hora</label>
                            <input type="time" name="hora" id="hora" style="border-radius:10px; margin-left:100px; ; width:300px;">
                        </div>
                        {{-- COMARCA --}}
                        <div class="form-group col-md-6 col-sm-4">
                            <label for="comarca">Comarca</label>
                            <select name="comarca" id="comarca" style="border-radius:10px; margin-left:94px; ; width:300px;">
                                <option value="exemple 1">Exemple 1</option>
                                <option value="exemple 2">Exemple 2</option>
                            </select>
                        </div>

                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6 col-sm-4">
                            {{-- TIPUS --}}
                            <label for="tipus">Tipus</label>
                            <select name="tipus" id="tipus" style="border-radius:10px; margin-left:95px; ; width:300px;">
                                <option value="Accident1">Accident 1</option>
                                <option value="Accident2">Accident 2</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6 col-sm-4">
                            {{-- MUNICIPI --}}
                            <label for="municipi">Municpi</label>
                            <select name="municipi" id="municipi" style="border-radius:10px; margin-left:100px; ; width:300px;">
                                <option value="municipi1">Municipi 1</option>
                                <option value="municipi2">Minicipi 2</option>
                            </select>
                        </div>

                    </div>
                    <div class="form-row">
                        {{-- ADREÇA --}}
                        <div class="form-group col-md-8">
                            <label for="adreça">Adreça</label>
                            <input type="text" name="adreça" id="adreça" style="border-radius:10px; margin-left:85px; ; width:300px;">
                        </div>
                    </div>
                    <div class="form-row">
                        {{-- DESCRIPCIO --}}
                        <div class="form-group col-md-4 col-sm-4">
                            <label for="descripcio">Descripcio</label>
                            <textarea name="descripcio" id="descripcio" cols="150" rows="2" style="border-radius:10px;"></textarea>
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

                    {{-- NOM, PROVINCIA I TELEFON DEL ALERTANT --}}
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="nomAlertant">Nom</label>
                            <input type="text" name="nomAlertant" id="nomAlertant" style="border-radius:10px; margin-left:85px; ; width:200px;">
                        </div>
                        <div class="form-group col-md-4 form-inline">
                            <input type="radio" name="BIn" id="BIn" value="Barcelona" style="margin-right:15px;">
                                <label for="BIn" style="margin-right:25px;">B</label><br>

                                <input type="radio" name="GIn" id="GIn" value="Girona" style="margin-right:15px;">
                                <label for="GIn" style="margin-right:25px;">G</label><br>

                                <input type="radio" name="LIn" id="LIn" value="Lleida" style="margin-right:15px;">
                                <label for="LIn" style="margin-right:25px;">L</label><br>

                                <input type="radio" name="TIn" id="TIn" value="Tarragona" style="margin-right:15px;">
                                <label for="TIn" style="margin-right:25px;">T</label><br>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="TelefonAlertant">Telefon</label>
                            <input type="text" name="TelefonAlertant" id="TelefonAlertant" style="border-radius:10px; margin-left:85px; ; width:200px;">
                        </div>
                    </div>

                    {{-- COGNOM I COMARCA ALERTANT --}}
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="cognomAlertant">Cognom</label>
                            <input type="text" name="cognomAlertant" id="cognomAlertant" style="border-radius:10px; margin-left:100px; ; width:300px;">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="comarcaAlertant">Comarca</label>
                            <select name="comarcaAlertant" id="comarcaAlertant" style="border-radius:10px; margin-left:100px; ; width:300px;">
                                <option value="exemple 1">Exemple 1</option>
                                <option value="exemple 2">Exemple 2</option>
                            </select>
                        </div>
                    </div>

                    {{-- TIPUS I MUNICIPI DEL ALERTANT --}}
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="tipusAlertant">Tipus</label>
                            <select name="tipusAlertant" id="tipusAlertant" style="border-radius:10px; margin-left:100px; ; width:300px;">
                                <option value="Accident1">Accident 1</option>
                                <option value="Accident2">Accident 2</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="municipiAlertant">Municipi</label>
                            <select name="municipiAlertant" id="municipiAlertant" style="border-radius:10px; margin-left:100px; ; width:300px;">
                                <option value="municipi1">Municipi 1</option>
                                <option value="municipi2">Minicipi 2</option>
                            </select>
                        </div>
                    </div>
                    {{-- ADREÇA DEL ALERTANT--}}
                    <div class="form-row">
                        <div class="form-group col-md-8">
                            <label for="adreçaAlertant">Adreça</label>
                            <input type="text" name="adreçaAlertant" id="adreçaAlertant" style="border-radius:10px; margin-left:100px; ; width:300px;">
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
                <div class="card-subbody card-subbody-formulari">

                    {{-- NOM, PROVINCIA I TELEFON DEL AFECTAT --}}
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="nomAfectat">Nom</label>
                            <input type="text" name="nomAfectat" id="nomAfectat" style="border-radius:10px; margin-left:85px; ; width:200px;">
                        </div>
                        <div class="form-group col-md-4 form-inline">
                            <input type="radio" name="BAf" id="BAf" value="Barcelona" style="margin-right:15px;">
                                <label for="BAf" style="margin-right:25px;">B</label><br>

                                <input type="radio" name="GAf" id="GAf" value="Girona" style="margin-right:15px;">
                                <label for="GAf" style="margin-right:25px;">G</label><br>

                                <input type="radio" name="LAf" id="LAf" value="Lleida" style="margin-right:15px;">
                                <label for="LAf" style="margin-right:25px;">L</label><br>

                                <input type="radio" name="TAf" id="TAf" value="Tarragona" style="margin-right:15px;">
                                <label for="TAf" style="margin-right:25px;">T</label><br>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="TelefonAfectat">Telefon</label>
                            <input type="text" name="TelefonAfectat" id="TelefonAfectat" style="border-radius:10px; margin-left:85px; ; width:200px;">
                        </div>
                    </div>
                    {{-- COGNOM, COMARCA I CIP DEL AFECTAT --}}
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="cognomAfectat">Cognom</label>
                            <input type="text" name="cognomAfectat" id="cognomAfectat" style="border-radius:10px; margin-left:85px; ; width:180px;">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="comarcaAfectat">Comarca</label>
                            <select name="comarcaAfectat" id="comarcaAfectat" style="border-radius:10px; margin-left:85px; ; width:180px;">
                                <option value="exemple 1">Exemple 1</option>
                                <option value="exemple 2">Exemple 2</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="cipAfectat">CIP</label>
                            <input type="text" name="cipAfectat" id="cipAfectat" style="border-radius:10px; margin-left:85px; ; width:200px;">
                        </div>
                    </div>
                    {{-- EDAT, SEXE I MUNICIPI DEL AFECTAT --}}
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="edatAfectat">Edat</label>
                            <input type="number" name="edatAfectat" id="edatAfectat" min="1" max="110" style="border-radius:10px; margin-left:85px; ; width:200px;">
                        </div>
                        <div class="form-group col-md-4 form-inline">

                            <input type="radio" name="home" id="home" value="Home" style="margin-right:15px;">
                            <label for="sexeAfectat" style="margin-right:25px;">Home</label><br>

                            <input type="radio" name="dona" id="dona" value="Dona" style="margin-right:15px;">
                            <label for="sexeAfectat" style="margin-right:25px;">Dona</label><br>

                        </div>
                        <div class="form-group col-md-4">
                            <label for="municipiAfectat">Municipi</label>
                            <select name="municipiAfectat" id="municipiAfectat" style="border-radius:10px; margin-left:85px; ; width:180px;">
                                <option value="municipi1">Municipi 1</option>
                                <option value="municipi2">Minicipi 2</option>
                            </select>
                        </div>
                    </div>
                    {{-- ADREÇA DEL AFECTAT --}}
                    <div class="form-row">
                        <div class="form-group col-md-8">
                            <label for="adreçaAfectat">Adreça</label>
                            <input type="text" name="adreçaAfectat" id="adreçaAfectat" style="border-radius:10px; margin-left:85px; ; width:200px;">
                        </div>
                    </div>
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
                <div class="card-subbody card-subbody-formulari">

                    {{-- TIPUS I CODI DE RECURS MOBIL --}}
                    <div class="form-row">

                        <div class="form-group col-md-4">
                            <label for="tipusRecurs">Tipus</label>
                            <select name="tipusRecurs" id="tipusRecurs" style="border-radius:10px; margin-left:85px; ; width:200px;">
                                <option value="Accident1">Helicòpter</option>
                                <option value="Accident2">Ambulància</option>
                            </select>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="CodiRecurs">Codi</label>
                            <select name="CodiRecurs" id="CodiRecurs" style="border-radius:10px; margin-left:85px; ; width:200px;">
                                <option value="Codi1">Codi1</option>
                                <option value="Codi2">Codi2</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-row">

                    </div>

                    {{-- HORES DEL RECURS MOBIL --}}

                    <div class="form-row">

                        <div class="form-group col-md-4">
                            <label for="hActivacio">Hora d'Activació</label>
                            <input type="time" name="hActivacio" id="hActivacio" style="border-radius:10px; margin-left:85px; ; width:100px;">
                        </div>

                        <div class="form-group col-md-4">
                            <label for="hMovilitzacio">Hora de Movilització</label>
                            <input type="time" name="hMovilitzacio" id="hMovilitzacio" style="border-radius:10px; margin-left:85px; ; width:100px;">
                        </div>

                        <div class="form-group col-md-4">
                            <label for="hAssistencia">Hora d'Assistencia</label>
                            <input type="time" name="hAssistencia" id="hAssistencia" style="border-radius:10px; margin-left:85px; ; width:100px;">
                        </div>

                    </div>

                    <div class="form-row">

                        <div class="form-group col-md-4">
                            <label for="hTransport">Hora de Transport</label>
                            <input type="time" name="hTransport" id="hTransport" style="border-radius:10px; margin-left:85px; ; width:80px;">
                        </div>

                        <div class="form-group col-md-4">
                            <label for="hArribada">Hora d'Arribada al Hospital</label>
                            <input type="time" name="hArribada" id="hArribada" style="border-radius:10px; margin-left:85px; ; width:50px;">
                        </div>

                        <div class="form-group col-md-4">
                            <label for="hTransferencia">Hora de Transferencia</label>
                            <input type="time" name="hTransferencia" id="hTransferencia" style="border-radius:10px; margin-left:85px; ; width:100px;">
                        </div>

                    </div>

                    <div class="form-row">

                        <div class="form-group col-md-4">
                            <label for="hFinalització">Hora de Finalització</label>
                            <input type="time" name="hFinalització" id="hFinalització" style="border-radius:10px; margin-left:85px; ; width:100px;">
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="card-footer text-muted text-center">
        <button class="btn btn-primary">Guardar</button>
        <button class="btn btn-primary">Cancelar</button>
    </div>
</div>
@endsection
