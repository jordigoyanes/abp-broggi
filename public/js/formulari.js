$( document ).ready(function() {

    $(function(){
        $('.tenirTarjeta').on('change', crearCip);
        $('.provinciaAfectat').on('change', actualitzarComarcaAfectat);
        $('.comarcaAfectat').on('change', actualitzarMunicipiAfectat);

        $('.tipusRecurs').on('change', actualitzarCodi);
    });

    var afectats = $('.afectat').length;
    var recursos = $('.recurs').length;


    // =========================================================
    //AFECTATS=================================================
    // =========================================================

    // Afegir afectat(es poden afegir fins a 9)
    $('#afegirAfectat').on('click', function(){

        $(function(){
            $('.tenirTarjeta').on('change', crearCip);
            $('.provinciaAfectat').on('change', actualitzarComarcaAfectat);
            $('.comarcaAfectat').on('change', actualitzarMunicipiAfectat);
            $('.eliminarAfectat').on('click', eliminarAfectat);
        });

        if(afectats<9){
            afectats++;
            $('.afectats').append($(
                "<div class='card-subbody card-subbody-formulari afectat' style='border-top: solid 1px black' id='afectat"+afectats+"'>"+
                    "<div class='d-flex justify-content-end'><button type='button' class='eliminarAfectat' id='brossaAfectat"+afectats+"'>brossa</button></div>"+
                    "<div class='form-row'>" +
                        "<div class='form-group col-md-6'>" +
                            "<label for='tenir_tarjeta"+afectats+"'>Te tarjeta S.S ?</label>" +
                            "<select name='tenir_tarjeta' id='tenir_tarjeta"+afectats+"' style='border-radius:10px; margin-left:100px; ; width:300px;' class='tenirTarjeta'>" +
                                "<option value='1' selected>Si</option>" +
                               " <option value='2'>No</option>" +
                            "</select>" +
                        "</div>" +

                        "<div class='form-group col-md-6'>" +
                            "<div class='' id='cip"+afectats+"'>" +
                                "<label for='CipAfectat'>CIP</label>" +
                                "<input type='text' name='CipAfectat' id='CipAfectat' style='border-radius:10px; margin-left:85px; ; width:300px;'>" +
                            "</div>" +
                        "</div>" +
                    "</div>"+

                    "<div class='form-row'>"+
                        "<div class='form-group col-md-6'>"+
                            "<label for='telefonAfectat'>Telefon</label>"+
                            "<input type='text' name='telefonAfectat' id='telefonAfectat' style='border-radius:10px; margin-left:150px; ; width:300px;'>"+
                        "</div>"+
                    "</div>"+

                    "<div class='form-row'>"+
                        "<p>(Opcional...)</p>"+
                    "</div>"+

                    "<div class='form-row'>"+
                        "<div class='form-group col-md-6'>"+
                            "<label for='nomAfectat'>Nom</label>"+
                            "<input type='text' name='nomAfectat' id='nomAfectat' style='border-radius:10px; margin-left:150px; ; width:300px;'>"+
                        "</div>"+

                        "<div class='form-group col-md-6'>"+
                            "<label for='cognomAfectat'>Cognom</label>"+
                           " <input type='text' name='cognomAfectat' id='cognomAfectat' style='border-radius:10px; margin-left:150px; ; width:300px;'>"+

                       " </div>"+
                    "</div>"+

                   " <div class='form-row'>"+
                        "<div class='form-group col-md-4'>"+
                            "<label for='sexeAfectat'>Sexe</label>"+
                            "<select name='sexeAfectat' id='sexeAfectat' style='border-radius:10px; margin-left:100px; ; width:100px;'>"+
                            "<option value='null' selected>Selecciona</option>"+
                                "<option value='Home'>Home</option>"+
                                "<option value='Dona'>Dona</option>"+
                            "</select>"+
                       " </div>"+

                        "<div class='form-group col-md-4'>"+
                            "<label for='edatAfectat'>Edat</label>"+
                            "<input type='number' name='edatAfectat' id='edatAfectat' style='border-radius:10px; margin-left:50px; ; width:50px;'>"+

                        "</div>"+
                    "</div>"+

                    "<div class='form-row'>"+
                        "<div class='form-group col-md-3'>"+
                            "<label for='provinciaAfectat"+afectats+"'>Provincia</label>"+
                                "<select name='provinciaAfectat' id='provinciaAfectat"+afectats+"' style='border-radius:10px; margin-left:50px; ; width:130px;' class='provinciaAfectat'>"+
                                    "<option value='0' selected>Selecciona una provincia</option>"+
                                    "<option value='1'>Barcelona</option>"+
                                    "<option value='2'>Girona</option>"+
                                    "<option value='3'>Lleida</option>"+
                                    "<option value='4'>Tarragona</option>"+
                                "</select>"+
                        "</div>"+

                        "<div class='form-group col-md-4 col-sm-4'>"+
                            "<label for='comarcaAfectat"+afectats+"' style='margin-left:10px;'>Comarca</label>"+
                            "<select name='comarcaAfectat' id='comarcaAfectat"+afectats+"' style='border-radius:10px; margin-left:60px;  width:180px;'>"+
                                "<option value=''>Selecciona una comarca</option>"+
                            "</select>"+
                        "</div>"+

                        "<div class='form-group col-md-5 col-sm-4'>"+
                            "<label for='municipiAfectat"+afectats+"'>Municipi</label>"+
                            "<select name='municipiAfectat' id='municipiAfectat"+afectats+"' style='border-radius:10px; margin-left:70px; ; width:290px;'>"+
                                    "<option value=''>Selecciona un municipi</option>"+
                            "</select>"+
                        "</div>"+
                    "</div>"+

                "</div>"
            ));
        }
    });

    // Amagar o mostrar cip depenent de si hi ha tarjeta ss
    function crearCip(){
        var te_tarjeta = $(this).val();
        var id_afectat = $(this).attr("id").slice(-1);

        if(te_tarjeta == '1'){
            $(".hidden").removeClass("hidden");
        }
        if(te_tarjeta == '2'){
            $("#cip"+id_afectat).addClass("hidden");
        }
    }

    // Actualitzar el select de comarques quan es tria la provincia
    function actualitzarComarcaAfectat() {
        var id_provincia = $(this).val();
        var id_afectat = $(this).attr("id").slice(-1);
        console.log("id provincia: "+id_provincia);
        // AJAX
        // $.get('http://localhost:80/abp-broggi/public/api/comarca/'+ id_provincia +'', function(data){
            $.get('http://broggi.lo:8888/public/api/comarca/'+ id_provincia +'', function(data){
            var html_select = '<option value="">Selecciona una comarca</option>'
            for(var i=0; i<data.length; i++)
                html_select += '<option value="'+ data[i].id +'">'+ data[i].nom +'</option>';
            $('#comarcaAfectat'+id_afectat).html(html_select);
        });
    }

    // Actualitzar el select de municipis quan es tria la comarca
    function actualitzarMunicipiAfectat(){
        var comarques_id = $(this).val();
        var id_afectat = $(this).attr("id").slice(-1);
        // AJAX
        //$.get('http://localhost:80/abp-broggi/public/api/municipi/'+ comarques_id +'', function(data){
        $.get('http://broggi.lo:8888/public/api/municipi/'+ comarques_id +'', function(data){
        var html_select = '<option value="">Selecciona un Municipi</option>'
        for(var i=0; i<data.length; i++)
            html_select += '<option value="'+ data[i].id +'">'+ data[i].nom +'</option>';
        $('#municipiAfectat'+id_afectat).html(html_select);
        });
    }

    // Eliminar un afectat
    function eliminarAfectat(){
        console.log("borrar afectat");
        var id_afectat = $(this).attr("id").slice(-1);
        $('#afectat'+id_afectat).remove();
    }


    // =========================================================
    //RECURSOS MOBILS===========================================
    // =========================================================

    // Afegir recurs(es poden afegir fins a 9)
    $('#afegirRecurs').on('click', function(){

        $(function(){
            $('.eliminarRecurs').on('click', eliminarRecurs);
            $('.tipusRecurs').on('change', actualitzarCodi);
        });

        if(recursos<9){
            recursos++;
            $('.recursos').append($(
            "<div id='recurs"+recursos+"' class='card-subbody card-subbody-formulari recurs' style='border-top: solid 1px black'>"+
                    "<div class='d-flex justify-content-end'><button type='button' class='eliminarRecurs' id='brossaRecurs"+recursos+"'>brossa</button></div>"+
                    "<div class='form-row'>"+
                        "<div class='form-group col-md-4'>"+
                            "<label for='tipusRecurs"+recursos+"'>Tipus</label>"+
                            "<select name='tipusRecurs' id='tipusRecurs"+recursos+"' style='border-radius:10px; margin-left:85px; ; width:200px;' class='tipusRecurs'>"+
                                "<option value='0' selected>Selecciona el tipus de recurs</option>"+
                                "@foreach ($tipusRecurs as $recurs)"+
                                    "<option value='{{ $recurs->id }}'> {{ $recurs->tipus }} </option>"+
                                "@endforeach"+
                            "</select>"+
                        "</div>"+

                        "<div class='form-group col-md-4'>"+
                            "<label for='CodiRecurs'>Codi</label>"+
                            "<select name='CodiRecurs' id='CodiRecurs' style='border-radius:10px; margin-left:85px; ; width:200px;'>"+
                                "<option value=''>Selecciona un codi</option>"+
                            "</select>"+
                        "</div>"+
                    "</div>"+

                    "<div class='form-row'>"+
                        "<div class='form-group col-md-4'>"+
                            "<label for='hActivacio'>Hora d'Activació</label>"+
                            "<input type='time' name='hActivacio' id='hActivacio' style='border-radius:10px; margin-left:85px; ; width:100px;'>"+
                        "</div>"+

                        "<div class='form-group col-md-4'>"+
                            "<label for='hMovilitzacio'>Hora de Movilització</label>"+
                            "<input type='time' name='hMovilitzacio' id='hMovilitzacio' style='border-radius:10px; margin-left:85px; ; width:100px;'>"+
                        "</div>"+

                        "<div class='form-group col-md-4'>"+
                            "<label for='hAssistencia'>Hora d'Assistencia</label>"+
                            "<input type='time' name='hAssistencia' id='hAssistencia' style='border-radius:10px; margin-left:85px; ; width:100px;'>"+
                        "</div>"+
                    "</div>"+

                    "<div class='form-row'>"+
                        "<div class='form-group col-md-4'>"+
                            "<label for='hTransport'>Hora de Transport</label>"+
                            "<input type='time' name='hTransport' id='hTransport' style='border-radius:10px; margin-left:85px; ; width:80px;'>"+
                        "</div>"+

                        "<div class='form-group col-md-4'>"+
                            "<label for='hArribada'>Hora d'Arribada al Hospital</label>"+
                            "<input type='time' name='hArribada' id='hArribada' style='border-radius:10px; margin-left:85px; ; width:50px;'>"+
                        "</div>"+

                        "<div class='form-group col-md-4'>"+
                            "<label for='hTransferencia'>Hora de Transferencia</label>"+
                            "<input type='time' name='hTransferencia' id='hTransferencia' style='border-radius:10px; margin-left:85px; ; width:100px;'>"+
                        "</div>"+
                    "</div>"+

                    "<div class='form-row'>"+
                        "<div class='form-group col-md-4'>"+
                            "<label for='hFinalització'>Hora de Finalització</label>"+
                            "<input type='time' name='hFinalització' id='hFinalització' style='border-radius:10px; margin-left:85px; ; width:100px;'>"+
                        "</div>"+
                    "</div>"+
                "</div>"
            ));
        }
    })

    function actualitzarCodi(){
        var codi = $(this).val();
        var id_recurs = $(this).attr("id").slice(-1);
        // AJAX
        // $.get('http://localhost:80/abp-broggi/public/api/codiRecurs/'+ codi +'', function(data){
        $.get('http://broggi.lo:8888/public/api/codiRecurs/'+ codi +'', function(data){
            var html_select = '<option value="">Selecciona un codi</option>'
            for(var i=0; i<data.length; i++)
                html_select += '<option value="'+ data[i].id +'">'+ data[i].codi +'</option>';
            $('#CodiRecurs'+id_recurs).html(html_select);
        });
    }

    // Eliminar un recurs
    function eliminarRecurs(){
        var id_recurs = $(this).attr("id").slice(-1);
        $('#recurs'+id_recurs).remove();
    }
});
