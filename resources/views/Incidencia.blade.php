@extends('templates.master3')
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
                            <label for="data">Data</label>
                            <input type="date" name="data" id="data" style="border-radius:10px; margin-left:100px; width:300px;">
                        </div>

                        {{-- PROVINCIA --}}

                        <div class="form-group col-md-6 col-sm-4 form-inline">
                            <label for="provinciaIncident">Provincia</label>
                            <select name="provinciaIncident" id="provinciaIncident" style="border-radius:10px; margin-left:94px; ; width:300px;">
                                <@foreach ($provincies as $provincia)

                                        <option value="{{ $provincia->id }}" selected> {{ $provincia->nom }} </option>

                                @endforeach
                            </select>

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
                                <option value="">Selecciona una Comarca</option>
                            </select>
                        </div>

                        {{-- SCRIPT AMB AJAX PER TROBAR LA COMARCA SEGONS EL ID DE LA PROVINCIA SELECCIONADA --}}
                        <script>
                            $(function(){
                                $('#provinciaIncident').on('change', actualitzarComarca);

                            });

                            function actualitzarComarca() {

                                var id_provincia = $(this).val();

                                // AJAX

                                $.get('http://localhost:80/abp-broggi/public/api/comarca/'+ id_provincia +'', function(data){

                                    var html_select = '<option value="">Selecciona una comarca</option>'

                                    for(var i=0; i<data.length; i++)

                                        html_select += '<option value="'+ data[i].id +'">'+ data[i].nom +'</option>';


                                    $('#comarca').html(html_select);

                                });
                            }

                        </script>

                    </div>

                    <div class="form-row">

                        <div class="form-group col-md-6 col-sm-4">
                            {{-- TIPUS --}}
                            <label for="tipus">Tipus</label>
                            <select name="tipus" id="tipus" style="border-radius:10px; margin-left:95px; ; width:300px;">
                                <@foreach ($tipusIncident as $tipus)

                                    <option value="{{ $tipus->id }}" selected> {{ $tipus->tipus }} </option>

                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col-md-6 col-sm-4">
                            {{-- MUNICIPI --}}
                            <label for="municipi">Municipi</label>
                            <select name="municipi" id="municipi" style="border-radius:10px; margin-left:100px; ; width:300px;">

                                    <option value="">Selecciona una Municipi</option>

                            </select>
                        </div>


                        {{-- SCRIPT PER TROBAR UN MUNICIPI SEGONS EL ID DE LA COMARCA SELECCIONADA --}}

                        <script>

                            $(function(){

                                $('#comarca').on('change', actualitzarMunicipi);

                            });

                            function actualitzarMunicipi(){

                                var comarques_id = $(this).val();


                                // AJAX

                                $.get('http://localhost:80/abp-broggi/public/api/municipi/'+ comarques_id +'', function(data){

                                var html_select = '<option value="">Seleccioni un Municipi</option>'

                                for(var i=0; i<data.length; i++)
                                    html_select += '<option value="'+ data[i].id +'">'+ data[i].nom +'</option>';


                                $('#municipi').html(html_select);
                                });

                            }


                        </script>

                    </div>

                    {{-- ADREÇA I COMPLEMENT DE LA ADREÇA --}}

                    <div class="form-row">


                        <div class="form-group col-md-6">
                            <label for="adreça">Adreça</label>
                            <input type="text" name="adreça" id="adreça" style="border-radius:10px; margin-left:85px; ; width:300px;">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="adreça2">Indicacions</label>
                            <input type="text" name="adreça2" id="adreça2" style="border-radius:10px; margin-left:85px; ; width:300px;">
                        </div>

                    </div>

                    <div class="form-row">

                        <div class="form-group col-md-6">
                            <label for="telefon">Telefon</label>
                            <input type="text" name="telefon" id="telefon" style="border-radius:10px; margin-left:85px; ; width:300px;">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="estatIncidencia">Estat </label>
                            <select name="estatIncidencia" id="estatIncidencia" style="border-radius:10px; margin-left:85px; ; width:100px;">
                                <@foreach ($estatsIncidencia as $estat)

                                        <option value="{{ $estat->id }}" selected> {{ $estat->estat }} </option>

                                    @endforeach

                            </select>
                        </div>


                    </div>
                    <div class="form-row">

                        <div class="form-group col-md-12">
                            <label for="localitzacio">Localitzacio</label>
                            <input type="text" name="localitzacio" id="localitzacio" style="border-radius:10px; margin-left:85px; ; width:800px;">
                        </div>

                    </div>

                    <div class="form-row">
                        {{-- DESCRIPCIO --}}
                        <div class="form-group col-md-4 col-sm-4">
                            <label for="descripcio">Descripcio</label>
                            <textarea name="descripcio" id="descripcio" cols="150" rows="3" style="border-radius:10px;"></textarea>
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
                                    <@foreach ($tipusAlertant as $tipus)

                                        <option value="{{ $tipus->id }}" selected> {{ $tipus->tipus }} </option>

                                    @endforeach
                                </select>
                            </div>

                            {{-- CENTRE SANITARI EN EL CAS DE QUE L'ALERTANT SIGUI AQUEST --}}

                            <div class="form-group col-md-6 col-sm-4">
                                <div class="hidden1" id="centre">
                                    <label for="CentreSanitari">Nom del Centre Sanitari</label>
                                    <select name="CentreSanitari" id="CentreSanitari" style="border-radius:10px; margin-left:60px;  width:180px;">
                                        <option value="">Selecciona una Centre</option>
                                    </select>
                                </div>

                            </div>

                            <script>

                            $(function(){
                                $('#CentreSanitari').on('change', actualitzarCamps);

                            });

                            function actualitzarCamps() {
                                var id = $(this).val();


                                // AJAX

                                $.get('http://localhost:80/abp-broggi/public/api/centreid/'+ id +'', function(data){


                                    var direccio = '<option value="'+ data.id +'">'+ data.nom +'</option>';


                                    $('#adreçaCentre').html(direccio);
                                });
                            }


                            </script>


                    </div>

                    <div class="form-row">

                        <div class="form-group col-md-6">
                            <div class="hidden1" id="metge">
                                <label for="NomMetge">Nom del Metge</label>
                                <input type="text" name="NomMetge" id="NomMetge" style="border-radius:10px; margin-left:85px; ; width:300px;">
                            </div>

                        </div>

                        <div class="form-group col-md-6">
                            <div class="hidden1" id="adreçaCentre">
                                <label for="adreçaCentre">Adreça del Centre</label>
                                <select name="adreçaCentre" id="adreçaCentre" style="border-radius:10px; margin-left:60px;  width:180px;">
                                    <option value=""></option>
                                </select>

                            </div>

                        </div>

                        <div class="form-group col-md-6">
                            <div class="" id="nomAlertant">
                                <label for="nomAlertant">Nom del Alertant</label>
                                <input type="text" name="nomAlertant" id="nomAlertant" style="border-radius:10px; margin-left:85px; ; width:300px;">

                            </div>

                        </div>

                        <div class="form-group col-md-6">
                            <div class="" id="cognomAlertant">
                                <label for="cognomAlertant">Cognom del Alertant</label>
                                <input type="text" name="cognomAlertant" id="cognomAlertant" style="border-radius:10px; margin-left:50px; ; width:200px;">

                            </div>

                        </div>

                    </div>

                    <div class="form-row">

                        <div class="form-group col-md-6">

                            <div class="" id="adreçaAlertant">
                                <label for="adreçaAlertant">Adreça del Alertant</label>
                                <input type="text" name="adreçaAlertant" id="adreçaAlertant" style="border-radius:10px; margin-left:50px; ; width:300px;">

                            </div>

                        </div>

                        <div class="form-group col-md-6">
                            <div class="" id="telefonAlertant">
                                <label for="telefonAlertant">Telefon del Alertant</label>
                                <input type="text" name="telefonAlertant" id="telefonAlertant" style="border-radius:10px; margin-left:50px; ; width:300px;">

                            </div>

                        </div>

                        <div class="form-group col-md-6">
                            <div class="hidden1" id="telefonCentre">
                                <label for="telefonCentre">Telefon del Centre</label>
                                <input type="text" name="telefonCentre" id="telefonCentre" style="border-radius:10px; margin-left:85px; ; width:250px;">

                            </div>

                        </div>





                    </div>

                    <div class="form-row">

                        {{-- PROVINCIA ALERTANT --}}

                        <div class="form-group col-md-4">
                            <div class="" id="provinciaAlertant">

                                <label for="provinciaAlertant">Provincia</label>
                                <select name="provinciaAlertant" id="provinciaAlertant" style="border-radius:10px; margin-left:50px; ; width:130px;">
                                    <@foreach ($provincies as $provincia)

                                            <option value="{{ $provincia->id }}" selected> {{ $provincia->nom }} </option>

                                    @endforeach
                                </select>

                            </div>


                        </div>

                        {{-- COMARCA --}}

                        <div class="form-group col-md-4">
                            <div class="" id="comarcaAlertant">

                                <label for="comarcaAlertant">Provincia</label>
                                <select name="comarcaAlertant" id="comarcaAlertant" style="border-radius:10px; margin-left:60px;  width:180px;">
                                    <option value="">Selecciona una Comarca</option>
                                </select>

                            </div>


                        </div>

                        {{-- SCRIPT AMB AJAX PER TROBAR LA COMARCA SEGONS EL ID DE LA PROVINCIA SELECCIONADA --}}
                        <script>
                            $(function(){
                                $('#provinciaAlertant').on('change', actualitzarComarca1);

                            });

                            function actualitzarComarca1() {
                                var id_provincia = $(this).val();


                                // AJAX

                                $.get('http://localhost:80/abp-broggi/public/api/comarca/'+ id_provincia +'', function(data){

                                    var html_select = '<option value="">Seleccioni una comarca</option>'

                                    for(var i=0; i<data.length; i++)
                                        html_select += '<option value="'+ data[i].id +'">'+ data[i].nom +'</option>';
                                        console.log(html_select);

                                    $('#comarcaAlertant').html(html_select);
                                });
                            }

                        </script>

                        {{-- MUNICIPI ALERTANT--}}
                        <div class="form-group col-md-4 col-sm-4">
                            <div class="" id="municipiAlertant">

                                <label for="municipiAlertant">Municipi</label>
                                <select name="municipiAlertant" id="municipiAlertant" style="border-radius:10px; margin-left:70px; ; width:200px;">

                                    <option value="">Selecciona una Municipi</option>

                            </select>

                            </div>

                        </div>


                        {{-- SCRIPT PER TROBAR UN MUNICIPI SEGONS EL ID DE LA COMARCA SELECCIONADA --}}

                        <script>

                            $(function(){

                                $('#comarcaAlertant').on('change', actualitzarMunicipi1);

                            });

                            function actualitzarMunicipi1(){

                                var comarques_id = $(this).val();


                                // AJAX

                                $.get('http://localhost:80/abp-broggi/public/api/municipi/'+ comarques_id +'', function(data){

                                var html_select = '<option value="">Seleccioni un Municipi</option>'

                                for(var i=0; i<data.length; i++)
                                    html_select += '<option value="'+ data[i].id +'">'+ data[i].nom +'</option>';


                                $('#municipiAlertant').html(html_select);
                                });
                            }


                        </script>




                    </div>

                    <script>

                        $(function(){

                            $('#tipusAlertant').on('change', crearCentre);

                        });

                        function crearCentre(){


                            var id = $(this).val();


                            if(id == 1){

                                $(".hidden1").removeClass("hidden1");
                                $(".hidden1").removeClass("hidden1");
                                $(".hidden1").removeClass("hidden1");
                                $("#nomAlertant").addClass("hidden2");
                                $("#cognomAlertant").addClass("hidden2");
                                $("#adreçaAlertant").addClass("hidden2");
                                $("#telefonAlertant").addClass("hidden2");
                                $("#provinciaAlertant").addClass("hidden2");
                                $("#comarcaAlertant").addClass("hidden2");
                                $("#municipiAlertant").addClass("hidden2");


                            }
                           else{
                                $("#centre").addClass("hidden1");
                                $("#metge").addClass("hidden1");
                                $("#adreçaCentre").addClass("hidden1");
                                $("#telefonCentre").addClass("hidden1");
                                $("#nomAlertant").removeClass("hidden2");
                                $("#cognomAlertant").removeClass("hidden2");
                                $("#adreçaAlertant").removeClass("hidden2");
                                $("#telefonAlertant").removeClass("hidden2");
                                $("#provinciaAlertant").removeClass("hidden2");
                                $("#comarcaAlertant").removeClass("hidden2");
                                $("#municipiAlertant").removeClass("hidden2");
                            }


                        }

                        $(function(){

                            $('#tipusAlertant').on('change', actualitzarCentre);

                        });

                        function actualitzarCentre(){

                            var id = $(this).val();


                            // AJAX

                            if(id == 1){

                                $.get('http://localhost:80/abp-broggi/public/api/centre/'+ id +'', function(data){

                                var html_select = '<option value="">Selecciona un Centre</option>'

                                for(var i=0; i<data.length; i++)
                                    html_select += '<option value="'+ data[i].id +'">'+ data[i].nom +'</option>';


                                $('#CentreSanitari').html(html_select);
                                });

                            }



                        }

                    </script>


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

                    <div class="form-row">

                        <div class="form-group col-md-6">
                            <label for="tenir_tarjeta">Te tarjeta S.S ?</label>
                            <select name="tenir_tarjeta" id="tenir_tarjeta" style="border-radius:10px; margin-left:100px; ; width:300px;">
                                <option value="1" selected>Si</option>
                                <option value="2">No</option>
                            </select>

                        </div>

                        <div class="form-group col-md-6">
                            <div class="" id="cip">
                                <label for="CipAfectat">CIP</label>
                                <input type="text" name="CipAfectat" id="CipAfectat" style="border-radius:10px; margin-left:85px; ; width:300px;">
                            </div>
                        </div>

                        <script>

                            $(function(){

                                $('#tenir_tarjeta').on('change', crearCip);

                            });

                            function crearCip(){


                                var te_tarjeta = $(this).val();


                                if(te_tarjeta == '1'){

                                    $(".hidden").removeClass("hidden");

                                }
                                if(te_tarjeta == '2'){
                                    $("#cip").addClass("hidden");
                                }


                            }


                        </script>



                    </div>

                    <div class="form-row">

                        <div class="form-group col-md-6">
                            <label for="telefonAfectat">Telefon</label>
                            <input type="text" name="telefonAfectat" id="telefonAfectat" style="border-radius:10px; margin-left:150px; ; width:300px;">

                        </div>

                    </div>

                    <div class="form-row">

                        <p>(Opcional...)</p>

                    </div>

                    <div class="form-row">

                        <div class="form-group col-md-6">
                            <label for="nomAfectat">Nom</label>
                            <input type="text" name="nomAfectat" id="nomAfectat" style="border-radius:10px; margin-left:150px; ; width:300px;">

                        </div>

                        <div class="form-group col-md-6">
                            <label for="cognomAfectat">Cognom</label>
                            <input type="text" name="cognomAfectat" id="cognomAfectat" style="border-radius:10px; margin-left:150px; ; width:300px;">

                        </div>


                    </div>

                    <div class="form-row">

                        <div class="form-group col-md-4">
                            <label for="sexeAfectat">Sexe</label>
                            <select name="sexeAfectat" id="sexeAfectat" style="border-radius:10px; margin-left:100px; ; width:100px;">
                                <option value="Home">Home</option>
                                <option value="Dona">Dona</option>
                            </select>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="edatAfectat">Edat</label>
                            <input type="number" name="edatAfectat" id="edatAfectat" style="border-radius:10px; margin-left:50px; ; width:50px;">

                        </div>


                    </div>
                    <div class="form-row">

                        {{-- PROVINCIA AFECTAT --}}

                        <div class="form-group col-md-3">

                            <label for="provinciaAfectat">Provincia</label>
                                <select name="provinciaAfectat" id="provinciaAfectat" style="border-radius:10px; margin-left:50px; ; width:130px;">
                                    <@foreach ($provincies as $provincia)

                                            <option value="{{ $provincia->id }}" selected> {{ $provincia->nom }} </option>

                                    @endforeach
                                </select>

                        </div>

                         {{-- COMARCA AFECTAT --}}

                         <div class="form-group col-md-4 col-sm-4">

                            <label for="comarcaAfectat" style="margin-left:10px;">Comarca</label>
                            <select name="comarcaAfectat" id="comarcaAfectat" style="border-radius:10px; margin-left:60px;  width:180px;">
                                <option value="">Selecciona una Comarca</option>
                            </select>
                        </div>

                        {{-- SCRIPT AMB AJAX PER TROBAR LA COMARCA SEGONS EL ID DE LA PROVINCIA SELECCIONADA --}}
                        <script>
                            $(function(){
                                $('#provinciaAfectat').on('change', actualitzarComarca2);

                            });

                            function actualitzarComarca2() {
                                var id_provincia = $(this).val();

                                // AJAX

                                $.get('http://localhost:80/abp-broggi/public/api/comarca/'+ id_provincia +'', function(data){

                                    var html_select = '<option value="">Seleccioni una comarca</option>'

                                    for(var i=0; i<data.length; i++)
                                        html_select += '<option value="'+ data[i].id +'">'+ data[i].nom +'</option>';
                                        console.log(html_select);

                                    $('#comarcaAfectat').html(html_select);
                                });
                            }

                        </script>


                        {{-- MUNICIPI AFECTAT--}}
                        <div class="form-group col-md-5 col-sm-4">

                            <label for="municipiAfectat">Municipi</label>
                            <select name="municipiAfectat" id="municipiAfectat" style="border-radius:10px; margin-left:70px; ; width:290px;">

                                    <option value="">Selecciona una Municipi</option>

                            </select>
                        </div>


                        {{-- SCRIPT PER TROBAR UN MUNICIPI SEGONS EL ID DE LA COMARCA SELECCIONADA --}}

                        <script>

                            $(function(){

                                $('#comarcaAfectat').on('change', actualitzarMunicipi2);

                            });

                            function actualitzarMunicipi2(){

                                var comarques_id = $(this).val();


                                // AJAX

                                $.get('http://localhost:80/abp-broggi/public/api/municipi/'+ comarques_id +'', function(data){

                                var html_select = '<option value="">Seleccioni un Municipi</option>'

                                for(var i=0; i<data.length; i++)
                                    html_select += '<option value="'+ data[i].id +'">'+ data[i].nom +'</option>';


                                $('#municipiAfectat').html(html_select);
                                });
                            }


                        </script>

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
                                @foreach ($tipusRecurs as $recurs)

                                <option value="{{ $recurs->id }}" selected> {{ $recurs->tipus }} </option>

                            @endforeach
                            </select>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="CodiRecurs">Codi</label>
                            <select name="CodiRecurs" id="CodiRecurs" style="border-radius:10px; margin-left:85px; ; width:200px;">
                                <option value="">Selecciona un codi</option>
                            </select>
                        </div>

                        <script>

                            $(function(){

                                $('#tipusRecurs').on('change', actualitzarCodi);

                            });

                            function actualitzarCodi(){

                                var codi = $(this).val();


                                // AJAX

                                $.get('http://localhost:80/abp-broggi/public/api/codiRecurs/'+ codi +'', function(data){

                                var html_select = '<option value="">Selecciona un Codi</option>'

                                for(var i=0; i<data.length; i++)
                                    html_select += '<option value="'+ data[i].id +'">'+ data[i].codi +'</option>';


                                $('#CodiRecurs').html(html_select);
                                });
                            }


                        </script>
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
        <button class="btn btn-primary" type="submit">Guardar</button>
        <button class="btn btn-primary" href="{{ url('/incidencia') }}" >Cancelar</button>
    </div>

    </form>
</div>

@endsection
