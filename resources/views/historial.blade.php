@extends('templates.master3')

@section('titulo')
HISTORIAL
@endsection

@section('principal')

<div class="historial d-flex row flex-row w-100 flex-wrap">

    <table class="table col-6 table-bordered">
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
    <div class="col-6">
        <div class="filtro_historial">
            <form action="">
                <input type="search" name="buscarIncidencia" id="buscarIncidencia" placeholder="Buscar Incidencia...">
                <button type="submit" class="botonBuscar">Lupa</button>
            </form>
        </div>

        <div class="formFiltros">

            <form action="" class="p-3" style="background-color:#D7F0F4;">

                <legend>FILTRES</legend>

                <fieldset class="boxFiltroHistorial">
                    <div class="form-group">
                        <label for="data"> Data</label>
                        <input type="date" name="data" id="data">
                        <input type="date" name="data" id="data">
                    </div>
                    <div class="form-group">
                        <label for="hora">Hora</label>
                        <input type="time" name="hora" id="hora">
                        <input type="time" name="hora" id="hora">
                    </div>
                    <div class="form-group">
                        <label for="provincia">Provincia</label>
                        <select name="provincia" id="provincia">
                            <option value="barcelona">Barcelona</option>
                            <option value="girona">Girona</option>
                            <option value="lleida">Lleida</option>
                            <option value="tarragona">Tarragona</option>
                        </select>
                    </div>
                    <!-- FALTA POSAR ELS MUNICIPIS SEGONS LA PROVINCIA -->
                    <div class="form-group">
                        <label for="municipi">Municipi</label>
                        <select name="municipi" id="municipi">
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

                <fieldset class="boxFiltroHistorial">
                    <div class="form-group">
                        <label for="tipusAlertant">Tipus d'Alertant</label>
                        <select name="tipusAlertant" id="tipusAlertant">
                            <option value="VIP">VIP</option>
                            <option value="nou">NOU</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="alertant">Alertant</label>
                        <select name="alertant" id="alertant">
                            <option value="santpau">Hospital de Sant Pau</option>
                            <option value="valldhebron">Hospital Vall d'Hebrón</option>
                        </select>
                    </div>
                </fieldset>

                <fieldset class="boxFiltroHistorial">

                    <div class="form-group">
                        <label for="edat">Edat</label>
                        <input type="number" name="edat" id="edat" style="width:50px; margin-left:15px;">
                        <input type="number" name="edat2" id="edat2" style="width:50px; margin-left:15px;">
                    </div>

                    <div class="form-group">
                        <label for="sexo">Sexo</label>

                        <input type="radio" name="home" id="home" value="home">
                        <label for="home">Home</label>


                        <input type="radio" name="dona" id="dona" value="dona">
                        <label for="dona">Dona</label>

                    </div>
                </fieldset>

                <fieldset class="boxFiltroHistorial">
                    <div class="form-group">
                        <label for="recursMobil">Tipus de Recurs Mòbil</label>
                        <select name="recursMobil" id="recursMobil">
                            <option value="Ambulància">Ambulància</option>
                            <option value="Helicòpter">Helicòpter</option>
                        </select>
                    </div>
                </fieldset>

                <fieldset class="boxFiltroHistorial">
                    <div class="form-group">

                        <div class="row" style="margin-left: 10px;">
                            <input type="checkbox" name="exemple1" id="exemple1">
                            <label for="exemple1">Exemple 1</label>

                            <input type="checkbox" name="exemple2" id="exemple2">
                            <label for="exemple2">Exemple 2</label>
                        </div>

                        <div class="row" style="margin-left: 10px;">
                            <input type="checkbox" name="exemple3" id="exemple3">
                            <label for="exemple3">Exemple 3</label>

                            <input type="checkbox" name="exemple4" id="exemple4">
                            <label for="exemple4">Exemple 4</label>
                        </div>

                    </div>
                </fieldset>

                <input type="reset" value="RESET" class="reset">
                <input type="submit" value="SUBMIT" class="submit">

            </form>
        </div>
    </div>


</div>



@endsection