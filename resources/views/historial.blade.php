@extends('templates.master3')

@section('titulo')
    HISTORIAL
@endsection

@section('principal')

<div class="content">

    <table class="table table-bordered" id="tabla-principal">
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

    <div class="historial">

        <div class="filtro_historial">
            <form action="">
                <input type="search" name="buscarIncidencia" id="buscarIncidencia" placeholder="Buscar Incidencia...">
                <button type="submit" class="botonBuscar" >Lupa</button>
            </form>
        </div>

        <div class="formFiltros">

            <form action=""  style="padding:15px; background-color:#D7F0F4;">

                <legend style="font-size: 14px; font-weight:bold;">FILTRES</legend>

                <fieldset class="boxFiltroHistorial" style="padding:15px;">
                    <div class="form-group">
                        <label for="data"> Data</label>
                        <input type="date" name="data" id="data" style="margin-left:10px; width:150px;">
                        <input type="date" name="data" id="data" style="margin-left:10px; width:150px;">
                    </div>
                    <div class="form-group">
                        <label for="hora">Hora</label>
                        <input type="time" name="hora" id="hora" style="margin-left:10px; width:75px;">
                        <input type="time" name="hora" id="hora" style="margin-left:10px; width:75px;">
                    </div>
                    <div class="form-group">
                        <label for="provincia">Provincia</label>
                        <select name="provincia" id="provincia" style="margin-left:10px;">
                            <option value="barcelona">Barcelona</option>
                            <option value="girona">Girona</option>
                            <option value="lleida">Lleida</option>
                            <option value="tarragona">Tarragona</option>
                        </select>
                    </div>
                    <!-- FALTA POSAR ELS MUNICIPIS SEGONS LA PROVINCIA -->
                    <div class="form-group">
                        <label for="municipi">Municipi</label>
                        <select name="municipi" id="municipi" style="margin-left:10px;">
                            <option value="Mataro">Mataro</option>
                            <option value="Arenys de Mar">Arenys de Mar</option>
                            <option value="Badalona	">Badalona	</option>
                            <option value="Calella">Calella</option>
                            <option value="Gavà">Gavà</option>
                            <option value="L'Hospitalet de Llobregat">L'Hospitalet de Llobregat</option>
                            <option value="Rubí">Rubí</option>
                        </select>
                    </div>
                </fieldset>

                <fieldset class="boxFiltroHistorial" style="padding:15px;">
                    <div class="form-group">
                        <label for="tipusAlertant">Tipus d'Alertant</label>
                        <select name="tipusAlertant" id="tipusAlertant" style="margin-left:10px;">
                            <option value="VIP">VIP</option>
                            <option value="nou">NOU</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="alertant">Alertant</label>
                        <select name="alertant" id="alertant" style="margin-left:10px;">
                            <option value="santpau">Hospital de Sant Pau</option>
                            <option value="valldhebron">Hospital Vall d'Hebrón</option>
                        </select>
                    </div>
                </fieldset>

                <fieldset class="boxFiltroHistorial" style="padding:15px;">

                    <div class="form-group">
                        <label for="edat">Edat</label>
                        <input type="number" name="edat" id="edat" style="width:50px; margin-left:15px;">
                        <input type="number" name="edat2" id="edat2" style="width:50px; margin-left:15px;">
                    </div>

                    <div class="form-group">
                        <label for="sexo">Sexo</label>

                        <input type="radio" name="home" id="home" value="home" style="margin-left:10px;">
                        <label for="home">Home</label>


                        <input type="radio" name="dona" id="dona" value="dona" style="margin-left:10px;">
                        <label for="dona">Dona</label>

                    </div>
                </fieldset>

                <fieldset class="boxFiltroHistorial" style="padding: 15px;">
                    <div class="form-group">
                        <label for="recursMobil">Tipus de Recurs Mòbil</label>
                        <select name="recursMobil" id="recursMobil" style="margin-left:10px;">
                            <option value="Ambulància">Ambulància</option>
                            <option value="Helicòpter">Helicòpter</option>
                        </select>
                    </div>
                </fieldset>

                <fieldset class="boxFiltroHistorial" style="padding: 15px;">
                    <div class="form-group">

                        <div class="row" style="margin-left: 10px;">
                            <input type="checkbox" name="exemple1" id="exemple1" style="margin-right: 10px; margin-top:5px;">
                            <label for="exemple1">Exemple 1</label>

                            <input type="checkbox" name="exemple2" id="exemple2" style="margin-right: 10px; margin-top:5px;  margin-left:50px;">
                            <label for="exemple2">Exemple 2</label>
                        </div>

                        <div class="row" style="margin-left: 10px;">
                            <input type="checkbox" name="exemple3" id="exemple3" style="margin-right: 10px; margin-top:5px;">
                            <label for="exemple3">Exemple 3</label>

                            <input type="checkbox" name="exemple4" id="exemple4" style="margin-right: 10px; margin-top:5px; margin-left:50px;">
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
