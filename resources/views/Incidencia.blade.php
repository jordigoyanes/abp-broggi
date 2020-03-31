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
                            <input type="date" name="data" id="data">
                        </div>
                        {{-- PROVINCIA --}}
                        <div class="form-group col-md-6 col-sm-4 form-inline">
                            <input type="radio" name="B" id="B" value="Barcelona">
                                <label for="B">B</label><br>

                                <input type="radio" name="G" id="G" value="Girona">
                                <label for="G">G</label><br>

                                <input type="radio" name="L" id="L" value="Lleida">
                                <label for="L">L</label><br>

                                <input type="radio" name="t" id="T" value="Tarragona">
                                <label for="T">T</label><br>
                        </div>

                    </div>
                    <div class="form-row">
                        {{-- HORA --}}
                        <div class="form-group col-md-6 col-sm-4">
                            <label for="hora">Hora</label>
                            <input type="time" name="hora" id="hora">
                        </div>
                        {{-- COMARCA --}}
                        <div class="form-group col-md-6 col-sm-4">
                            <label for="comarca">Comarca</label>
                            <select name="comarca" id="comarca">
                                <option value="exemple 1">Exemple 1</option>
                                <option value="exemple 2">Exemple 2</option>
                            </select>
                        </div>

                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6 col-sm-4">
                            {{-- TIPUS --}}
                            <label for="tipus">Tipus</label>
                            <select name="tipus" id="tipus">
                                <option value="Accident1">Accident 1</option>
                                <option value="Accident2">Accident 2</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6 col-sm-4">
                            {{-- MUNICIPI --}}
                            <label for="municipi">Municpi</label>
                            <select name="municipi" id="municipi">
                                <option value="municipi1">Municipi 1</option>
                                <option value="municipi2">Minicipi 2</option>
                            </select>
                        </div>

                    </div>
                    <div class="form-row">
                        {{-- ADREÇA --}}
                        <div class="form-group col-md-8">
                            <label for="adreça">Adreça</label>
                            <input type="text" name="adreça" id="adreça">
                        </div>
                    </div>
                    <div class="form-row">
                        {{-- DESCRIPCIO --}}
                        <div class="form-group col-md-4 col-sm-4">
                            <label for="descripcio">Descripcio</label>
                            <textarea name="descripcio" id="descripcio" cols="100" rows="2"></textarea>
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
                            <input type="text" name="nomAlertant" id="nomAlertant">
                        </div>
                        <div class="form-group col-md-4 form-inline">
                            <input type="radio" name="BIn" id="BIn" value="Barcelona">
                                <label for="BIn">B</label><br>

                                <input type="radio" name="GIn" id="GIn" value="Girona">
                                <label for="GIn">G</label><br>

                                <input type="radio" name="LIn" id="LIn" value="Lleida">
                                <label for="LIn">L</label><br>

                                <input type="radio" name="TIn" id="TIn" value="Tarragona">
                                <label for="TIn">T</label><br>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="TelefonAlertant">Telefon</label>
                            <input type="text" name="TelefonAlertant" id="TelefonAlertant">
                        </div>
                    </div>

                    {{-- COGNOM I COMARCA ALERTANT --}}
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="cognomAlertant">Cognom</label>
                            <input type="text" name="cognomAlertant" id="cognomAlertant">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="comarcaAlertant">Comarca</label>
                            <select name="comarcaAlertant" id="comarcaAlertant">
                                <option value="exemple 1">Exemple 1</option>
                                <option value="exemple 2">Exemple 2</option>
                            </select>
                        </div>
                    </div>

                    {{-- TIPUS I MUNICIPI DEL ALERTANT --}}
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="tipusAlertant">Tipus</label>
                            <select name="tipusAlertant" id="tipusAlertant">
                                <option value="Accident1">Accident 1</option>
                                <option value="Accident2">Accident 2</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="municipiAlertant">Municipi</label>
                            <select name="municipiAlertant" id="municipiAlertant">
                                <option value="municipi1">Municipi 1</option>
                                <option value="municipi2">Minicipi 2</option>
                            </select>
                        </div>
                    </div>
                    {{-- ADREÇA DEL ALERTANT--}}
                    <div class="form-row">
                        <div class="form-group col-md-8">
                            <label for="adreçaAlertant">Adreça</label>
                            <input type="text" name="adreçaAlertant" id="adreçaAlertant">
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
                            <input type="text" name="nomAfectat" id="nomAfectat">
                        </div>
                        <div class="form-group col-md-4 form-inline">
                            <input type="radio" name="BAf" id="BAf" value="Barcelona">
                                <label for="BAf">B</label><br>

                                <input type="radio" name="GAf" id="GAf" value="Girona">
                                <label for="GAf">G</label><br>

                                <input type="radio" name="LAf" id="LAf" value="Lleida">
                                <label for="LAf">L</label><br>

                                <input type="radio" name="TAf" id="TAf" value="Tarragona">
                                <label for="TAf">T</label><br>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="TelefonAfectat">Telefon</label>
                            <input type="text" name="TelefonAfectat" id="TelefonAfectat">
                        </div>
                    </div>
                    {{-- COGNOM, COMARCA I CIP DEL AFECTAT --}}
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="cognomAfectat">Cognom</label>
                            <input type="text" name="cognomAfectat" id="cognomAfectat">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="comarcaAfectat">Comarca</label>
                            <select name="comarcaAfectat" id="comarcaAfectat">
                                <option value="exemple 1">Exemple 1</option>
                                <option value="exemple 2">Exemple 2</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="cipAfectat">CIP</label>
                            <input type="text" name="cipAfectat" id="cipAfectat">
                        </div>
                    </div>
                    {{-- EDAT, SEXE I MUNICIPI DEL AFECTAT --}}
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="edatAfectat">Edat</label>
                            <input type="number" name="edatAfectat" id="edatAfectat" min="1" max="110">
                        </div>
                        <div class="form-group col-md-4 form-inline">

                            <input type="radio" name="home" id="home" value="Home">
                            <label for="sexeAfectat">Home</label><br>

                            <input type="radio" name="dona" id="dona" value="Dona">
                            <label for="sexeAfectat">Dona</label><br>

                        </div>
                        <div class="form-group col-md-4">
                            <label for="municipiAfectat">Municipi</label>
                            <select name="municipiAfectat" id="municipiAfectat">
                                <option value="municipi1">Municipi 1</option>
                                <option value="municipi2">Minicipi 2</option>
                            </select>
                        </div>
                    </div>
                    {{-- ADREÇA DEL AFECTAT --}}
                    <div class="form-row">
                        <div class="form-group col-md-8">
                            <label for="adreçaAfectat">Adreça</label>
                            <input type="text" name="adreçaAfectat" id="adreçaAfectat">
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

                    <div class="form-row">

                    </div>














                </div>
            </div>
        </div>
    </div>
    <div class="card-footer">
        <button class="btn btn-primary">Guardar</button>
        <button class="btn btn-primary">Cancelar</button>
    </div>
</div>
@endsection
