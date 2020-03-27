@extends('templates.master3')

@section('titulo')
HISTORIAL
@endsection

@section('principal')

<div class="historial d-flex flex-column w-100">

    <div class="w-100">
        <div class="d-flex flex-row flex-wrap align-items-center justify-content-between mb-2">
            <h5>Historial</h5>
            <form action="" class="d-flex flex-row">
                <input type="search" class="form-control" name="buscarIncidencia" id="buscarIncidencia"
                    placeholder="Buscar Incidencia...">
                <button class="ml-2 btn btn-primary" type="submit" class="botonBuscar">Buscar</button>
            </form>
        </div>
        <div class="formFiltros">
            <form action="" class="p-3" style="background-color:#D7F0F4;">
                <div class="d-flex flex-row justify-content-between flex-wrap">
                    <fieldset class="boxFiltroHistorial">

                        <label for="data">Data</label>
                        <div class="form-inline justify-content-between">
                            <label for="data_desde">Desde</label>
                            <input class="form-control ml-1" type="date" name="data_desde" id="data_desde">
                        </div>
                        <div class="form-inline justify-content-between">
                            <label for="data_hasta">Fins</label>
                            <input class="form-control ml-1" type="date" name="data_hasta" id="data_hasta">
                        </div>
                        <label for="hora" class="mt-1">Hora</label>
                        <div class="form-inline justify-content-between">
                            <label for="hora_desde">Desde</label>
                            <input class="form-control ml-1" type="time" name="hora_desde" id="hora_desde">
                        </div>
                        <div class="form-inline justify-content-between">
                            <label for="hora_fins">Fins</label>
                            <input class="form-control ml-1" type="time" name="hora_fins" id="hora_fins">
                        </div>


                    </fieldset>

                    <fieldset class="boxFiltroHistorial">
                        <div class="form-group">
                            <label for="tipusAlertant">Tipus d'alertant</label>
                            <select class="form-control" name="tipusAlertant" id="tipusAlertant">
                                <option value="VIP">VIP</option>
                                <option value="nou">NOU</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="alertant">Alertant</label>
                            <select class="form-control" name="alertant" id="alertant">
                                <option value="santpau">Hospital de Sant Pau</option>
                                <option value="valldhebron">Hospital Vall d'Hebrón</option>
                            </select>
                        </div>
                    </fieldset>

                    <fieldset class="boxFiltroHistorial">

                        <div class="form-group">
                            <label for="edat">Edat</label>
                            <input class="form-control" min="0" max="200" value="0" type="number" name="edat" id="edat">
                            <input class="form-control" min="0" max="200" type="number" name="edat" id="edat">
                        </div>

                        <div class="form-group">

                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="sexo" id="sexo" value="home">
                                <label class="form-check-label" for="sexo">Home</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="sexo" id="sexo" value="dona">
                                <label class="form-check-label" for="sexo">Dona</label>
                            </div>
                        </div>
                    </fieldset>

                    <fieldset class="boxFiltroHistorial">
                        <div class="form-group">
                            <label for="recursMobil">Tipus de Recurs Mòbil</label>
                            <select class="form-control" name="recursMobil" id="recursMobil">
                                <option value="Ambulància">Ambulància</option>
                                <option value="Helicòpter">Helicòpter</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="provincia">Provincia</label>
                            <select class="form-control" name="provincia" id="provincia">
                                <option value="barcelona">Barcelona</option>
                                <option value="girona">Girona</option>
                                <option value="lleida">Lleida</option>
                                <option value="tarragona">Tarragona</option>
                            </select>
                        </div>
                        <!-- FALTA POSAR ELS MUNICIPIS SEGONS LA PROVINCIA -->
                        <div class="form-group">
                            <label for="municipi">Municipi</label>
                            <select class="form-control" name="municipi" id="municipi">
                                <option value="Mataro">Mataro</option>
                                <option value="Arenys de Mar">Arenys de Mar</option>
                                <option value="Badalona	">Badalona </option>
                                <option value="Calella">Calella</option>
                                <option value="Gavà">Gavà</option>
                                <option value="L'Hospitalet de Llobregat">L'Hospitalet de Llobregat</option>
                                <option value="Rubí">Rubí</option>
                            </select>
                        </div>
                    </fieldset>


                </div>

                <div class="d-flex justify-content-between flex-row">
                    <div class="form-inline d-flex align-items-center">

                        <div class="form-check ml-1">
                            <input class="form-check-input" type="checkbox" name="exemple1" id="exemple1">
                            <label for="exemple1">Exemple 1</label>

                        </div>
                        <div class="form-check ml-1">
                            <input class="form-check-input" type="checkbox" name="exemple2" id="exemple2">
                            <label for="exemple2">Exemple 2</label>
                        </div>
                        <div class="form-check ml-1">
                            <input class="form-check-input" type="checkbox" name="exemple3" id="exemple3">
                            <label for="exemple3">Exemple 3</label>
                        </div>
                        <div class="form-check ml-1">
                            <input class="form-check-input" type="checkbox" name="exemple4" id="exemple4">
                            <label for="exemple4">Exemple 4</label>
                        </div>

                    </div>
                    <div class="actions">

                        <button type="reset" class="btn btn-secondary">RESET</button>
                        <button type="submit" class="btn btn-primary ml-2">FILTRAR</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
    <table class="table mt-3 w-100 table-bordered">
        <thead style="background-color: #1CADC3; color:white;">
            <tr>
                <th>ID</th>
                <th>LOCALITZACIÓ</th>
                <th>TIPUS</th>
                <th>CIUTAT</th>
                <th>DATA</th>
                <th>HORA</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td scope="row"></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </tbody>
    </table>



</div>



@endsection