$( document ).ready(function() {

    $(function(){
        //Formulari incidencia
        $('#provinciaIncidencia').on('change', actualitzarComarca);
        $('#comarcaIncidencia').on('change', actualitzarMunicipi);

        // $('#CentreSanitari').on('change', actualitzarCamps);
        $('#provinciaAlertant').on('change', actualitzarComarca);
        $('#comarcaAlertant').on('change', actualitzarMunicipi);
        $('#tipusAlertant').on('change', crearCentre);
        $('#tipusAlertant').on('change', actualitzarCentre);

        $('.tenirTarjeta').on('change', crearCip);
        $('.provinciaAfectat').on('change', actualitzarComarcaAfectat);
        $('.comarcaAfectat').on('change', actualitzarMunicipiAfectat);

        $('.tipusRecurs').on('change', actualitzarCodi);

        //Formulari recurs usuari
        $('.tipusRecursUsuari').on('change', actualitzarCodiUsuari);

        //Formulari nou recurs
        $('#tipusRecursNou').on('change', actualitzarCodiNou);
    });

    //Formulari incidencia
    var afectats = $('.afectat').length;
    var recursos = $('.recurs').length;

    crearCentre();

    actualitzarProvincia();
    actualitzarProvinciaAfectat();

    actualitzarTipusRecurs();

    setDefaultValues();

    //Formulari recurs usuari
    var recursosUsuari = $('.recursUsuari').length;

    actualitzarTipusRecursUsuari();


    //FORMULARI INCIDENCIA *************************************

    // =========================================================
    //INCIDENCIA================================================
    // =========================================================

    //Actualitzar el select de provincies al crear una incidencia
    function actualitzarProvincia(){
        $.get('/abp-broggi/public/api/provincies', function(data){
        var html_select = '<option value="">Selecciona una provincia</option>'
        for(var i=0; i<data.length; i++)
            html_select += '<option value="'+ data[i].id +'">'+ data[i].nom +'</option>';
            $('#provinciaIncidencia').html(html_select);
            $('#provinciaAlertant').html(html_select);
            });
    }

    // Actualitzar el select de comarques quan es tria la provincia
    // SCRIPT AMB AJAX PER TROBAR LA COMARCA SEGONS EL ID DE LA PROVINCIA SELECCIONADA
    function actualitzarComarca() {
        var id_provincia = $(this).val();
        var id_camp = $(this).attr('id');
        var apartat = id_camp.slice(("provincia").length, id_camp.length);
        // AJAX
        $.get('/abp-broggi/public/api/comarca/'+ id_provincia +'', function(data){
            var html_select = '<option value="">Selecciona una comarca</option>'
            for(var i=0; i<data.length; i++)
                html_select += '<option value="'+ data[i].id +'">'+ data[i].nom +'</option>';
            $('#comarca'+apartat).html(html_select);
        });
    }

    // Actualitzar el select de municipis quan es tria la comarca
    // SCRIPT PER TROBAR UN MUNICIPI SEGONS EL ID DE LA COMARCA SELECCIONADA
    function actualitzarMunicipi(){
        var comarques_id = $(this).val();
        var id_camp = $(this).attr('id');
        var apartat = id_camp.slice(("comarca").length, id_camp.length);
        $.get('/abp-broggi/public/api/municipi/'+ comarques_id +'', function(data){
        var html_select = '<option value="">Selecciona un municipi</option>'
        for(var i=0; i<data.length; i++)
            html_select += '<option value="'+ data[i].id +'">'+ data[i].nom +'</option>';
        $('#municipi'+apartat).html(html_select);
        });
    }

    // =========================================================
    //ALERTANT==================================================
    // =========================================================

    // Actualitza els camps del tipus d'alertant
    // function actualitzarCamps() {
    //     var id = $(this).val();
    //     // AJAX
    //     $.get('/abp-broggi/public/api/centreid/'+ id +'', function(data){
    //         var Nom = '<option value="'+ data[0].id +'">'+ data[0].nom +'</option>';
    //         var telefon = '<option value="'+ data[0].id +'">'+ data[0].telefon +'</option>';
    //         var direccio = '<option value="'+ data[0].id +'">'+ data[0].adreca +'</option>';
    //         $('#centreSanitari').html(Nom);
    //         $('#telefonCentre').html(telefon);
    //         $('#adreçaCentre').html(direccio);
    //     });
    // }

    //Canviar els camps a plenar segons el tipus d'alertant
    function crearCentre(){
        var id = $('#tipusAlertant').val();

        if(id == 1){
            $('.centre_san_si').css("display", "inline-block");
            $('.centre_san_no').css("display", "none");
        }else if(id==2){
            $('.centre_san_si').css("display", "none");
            $('.centre_san_no').css("display", "none");
        }else{
            $('.centre_san_si').css("display", "none");
            $('.centre_san_no').css("display", "block");
        }
    }

    //Plenar el select de nom del centre en cas de l'alertant sigui centre
    function actualitzarCentre(){
        var id = $(this).val();

        // AJAX
        if(id == 1){
            $.get('/abp-broggi/public/api/centre/'+ id +'', function(data){
            var html_select = '<option value="">Selecciona un Centre</option>'
            for(var i=0; i<data.length; i++)
                html_select += '<option value="'+ data[i].id +'">'+ data[i].nom +'</option>';
                console.log(html_select);
            $('#centreSanitari').html(html_select);
            });
        }
    }

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
                "<div class='card-subbody card-subbody-formulari afectat' style='border-top: solid 1px #1C687D' id='afectat"+afectats+"'>"+
                    "<div class='d-flex justify-content-end py-3'>"+
                    "<button id='brossaAfectat"+afectats+"' class='afegir rounded-circle border-0 d-flex flex-row align-items-center btn-sm eliminarAfectat' type='button' style='padding:7px 10px 12px'>"+
                        "<span class='align-self-center my-auto text-white'>-</span>"+
                    "</button></div>"+
                    "<div class='form-row'>" +
                        "<div class='form-group col-md-6'>" +
                            "<label for='tenir_tarjeta"+afectats+"'>Te tarjeta S.S ?</label>" +
                            "<select name='tenir_tarjeta"+afectats+"' id='tenir_tarjeta"+afectats+"' style='border-radius:10px; margin-left:100px; ; width:300px;' class='tenirTarjeta'>" +
                                "<option value='1' selected>Si</option>" +
                               " <option value='2'>No</option>" +
                            "</select>" +
                        "</div>" +

                        "<div class='form-group col-md-6'>" +
                            "<div class='' id='cip"+afectats+"'>" +
                                "<label for='CipAfectat"+afectats+"'>CIP</label>" +
                                "<input type='text' name='CipAfectat"+afectats+"' id='CipAfectat"+afectats+"' style='border-radius:10px; margin-left:85px; ; width:300px;' value=''>" +
                            "</div>" +
                        "</div>" +
                    "</div>"+

                    "<div class='form-row'>"+
                        "<div class='form-group col-md-6'>"+
                            "<label for='telefonAfectat"+afectats+"'>Telefon</label>"+
                            "<input type='text' name='telefonAfectat"+afectats+"' id='telefonAfectat"+afectats+"' style='border-radius:10px; margin-left:150px; ; width:300px;' value=''>"+
                        "</div>"+
                    "</div>"+

                    "<div class='form-row'>"+
                        "<div class='form-group col-md-6'>"+
                            "<label for='nomAfectat"+afectats+"'>Nom</label>"+
                            "<input type='text' name='nomAfectat"+afectats+"' id='nomAfectat"+afectats+"' style='border-radius:10px; margin-left:150px; ; width:300px;' value=''>"+
                        "</div>"+

                        "<div class='form-group col-md-6'>"+
                            "<label for='cognomAfectat"+afectats+"'>Cognom</label>"+
                           " <input type='text' name='cognomAfectat"+afectats+"' id='cognomAfectat"+afectats+"' style='border-radius:10px; margin-left:150px; ; width:300px;' value=''>"+

                       " </div>"+
                    "</div>"+

                   " <div class='form-row'>"+
                        "<div class='form-group col-md-4'>"+
                            "<label for='sexeAfectat'>Sexe</label>"+
                            "<select name='sexeAfectat' id='sexeAfectat' style='border-radius:10px; margin-left:100px; ; width:100px;'>"+
                            "<option value='' selected>Selecciona</option>"+
                                "<option value='Home'>Home</option>"+
                                "<option value='Dona'>Dona</option>"+
                                "<option value='Altres'>Altres</option>"+
                            "</select>"+
                       " </div>"+

                        "<div class='form-group col-md-4'>"+
                            "<label for='edatAfectat"+afectats+"'>Edat</label>"+
                            "<input type='number' name='edatAfectat"+afectats+"' id='edatAfectat"+afectats+"' style='border-radius:10px; margin-left:50px; ; width:50px;' value=''>"+

                        "</div>"+
                    "</div>"+

                    "<div class='form-row'>"+
                        "<div class='form-group col-md-3'>"+
                            "<label for='provinciaAfectat"+afectats+"'>Provincia</label>"+
                                "<select name='provinciaAfectat"+afectats+"' id='provinciaAfectat"+afectats+"' style='border-radius:10px; margin-left:50px; ; width:130px;' class='provinciaAfectat'>"+
                                    "<option value=''>Selecciona una provincia</option>"+
                                "</select>"+
                        "</div>"+

                        "<div class='form-group col-md-4 col-sm-4'>"+
                            "<label for='comarcaAfectat"+afectats+"' style='margin-left:10px;'>Comarca</label>"+
                            "<select name='comarcaAfectat"+afectats+"' id='comarcaAfectat"+afectats+"' style='border-radius:10px; margin-left:60px;  width:180px;' class='comarcaAfectat'>"+
                                "<option value=''>Selecciona una comarca</option>"+
                            "</select>"+
                        "</div>"+

                        "<div class='form-group col-md-5 col-sm-4'>"+
                            "<label for='municipiAfectat"+afectats+"'>Municipi</label>"+
                            "<select name='municipiAfectat"+afectats+"' id='municipiAfectat"+afectats+"' style='border-radius:10px; margin-left:70px; ; width:290px;'>"+
                                    "<option value=''>Selecciona un municipi</option>"+
                            "</select>"+
                        "</div>"+
                    "</div>"+
                "</div>"
            ));
            actualitzarProvinciaAfectat();
            $('#numAfectats').val(afectats);
        }
    });

    // Amagar o mostrar cip depenent de si hi ha tarjeta ss
    function crearCip(){
        var te_tarjeta = $(this).val();
        var id_afectat = $(this).attr("id").slice(-1);

        if(te_tarjeta == '1'){
            $("#cip"+id_afectat).css("display", "block");
        }else{
            $("#cip"+id_afectat).css("display", "none");
        }
    }

    //Actualitzar el select de provincies al crear un afectat nou
    function actualitzarProvinciaAfectat(){
        // AJAX
        $.get('/abp-broggi/public/api/provincies', function(data){
            var html_select = '<option value="">Selecciona una provincia</option>'

            for(var i=0; i<data.length; i++)
                html_select += '<option value="'+ data[i].id +'">'+ data[i].nom +'</option>';

            for(var j=1; j<=afectats; j++)
                $('#provinciaAfectat'+j).html(html_select);

        });
    }

    // Actualitzar el select de comarques quan es tria la provincia
    function actualitzarComarcaAfectat() {
        var id_provincia = $(this).val();
        var id_afectat = $(this).attr("id").slice(-1);
        // AJAX
            $.get('/abp-broggi/public/api/comarca/'+ id_provincia +'', function(data){
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
        $.get('/abp-broggi/public/api/municipi/'+ comarques_id +'', function(data){
        var html_select = '<option value="">Selecciona un Municipi</option>'
        for(var i=0; i<data.length; i++)
            html_select += '<option value="'+ data[i].id +'">'+ data[i].nom +'</option>';
        $('#municipiAfectat'+id_afectat).html(html_select);
        });
    }

    // Eliminar un afectat
    function eliminarAfectat(){
        var id_afectat = $(this).attr("id").slice(-1);
        $('#afectat'+id_afectat).remove();
        afectats = $('.afectat').length;
        $('#numAfectats').val(afectats);
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
            "<div id='recurs"+recursos+"' class='card-subbody-formulari recurs' style='border-top: solid 1px black'>"+
                "<div class='d-flex justify-content-end py-3'>"+
                    "<button id='brossaRecurs"+recursos+"' class='afegir rounded-circle border-0 d-flex flex-row align-items-center btn-sm eliminarRecurs' type='button' style='padding:7px 10px 12px'>"+
                        "<span class='align-self-center my-auto text-white'>-</span>"+
                    "</button></div>"+
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
                            "<label for='CodiRecurs"+recursos+"'>Codi</label>"+
                            "<select name='CodiRecurs"+recursos+"' id='CodiRecurs"+recursos+"' style='border-radius:10px; margin-left:85px; ; width:200px;'>"+
                                "<option value=''>Selecciona un codi</option>"+
                            "</select>"+
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
            actualitzarTipusRecurs();
            $('#numRecursos').val(recursos);
        }
    })

    function actualitzarTipusRecurs(){
        $.get('/abp-broggi/public/api/tipusRecurs', function(data){
            var html_select = '<option value="">Selecciona el tipus</option>'
            for(var i=0; i<data.length; i++)
                html_select += '<option value="'+ data[i].id +'">'+ data[i].tipus +'</option>';
            for(var j=1; j<=recursos; j++)
                $('#tipusRecurs'+j).html(html_select);
        });
    }

    function actualitzarCodi(){
        var codi = $(this).val();
        var id_recurs = $(this).attr("id").slice(-1);
        // AJAX
        $.get('/abp-broggi/public/api/codiRecurs/'+ codi +'', function(data){
            var html_select = '<option value="">Selecciona un codi</option>'
            for(var i=0; i<data.length; i++)
                html_select += '<option value="'+ data[i].codi +'">'+ data[i].codi +'</option>';
                console.log(html_select)
            $('#CodiRecurs'+id_recurs).html(html_select);
        });
    }

    // Eliminar un recurs
    function eliminarRecurs(){
        var id_recurs = $(this).attr("id").slice(-1);
        $('#recurs'+id_recurs).remove();
        $('#numRecursos').val(recursos);
    }

    // =========================================================
    //DEFAULT VALUES===========================================
    // =========================================================

    function setDefaultValues(){
        var now = new Date();
        var day = ("0" + now.getDate()).slice(-2);
        var month = ("0" + (now.getMonth() + 1)).slice(-2);
        var today = now.getFullYear()+"-"+(month)+"-"+(day);
        var time = now.getHours() + ":";
        if(now.getMinutes()<10){
            time+= "0" + now.getMinutes();
        }else{
            time+= now.getMinutes();
        }

        $('#dataIncidencia').val(today);
        $('#horaIncidencia').val(time);
    }

    //FORMULARI RECURS USUARI *************************************
    // Afegir recurs(es poden afegir fins a 9)
    $('#afegirRecursUsuari').on('click', function(){
        $(function(){
            $('.eliminarRecursUsuari').on('click', eliminarRecursUsuari);
            $('.tipusRecursUsuari').on('change', actualitzarCodiUsuari);
        });

        if(recursosUsuari<9){
            recursosUsuari++;
            $('.recursos').append($(
                "<div class='recursUsuari' style='border-top: solid 1px #1C687D' id='recursUsuari"+recursosUsuari+"'>"+
                    "<div class='d-flex justify-content-end py-3'>"+
                    "<button id='brossaRecurs"+recursosUsuari+"' class='afegir rounded-circle border-0 d-flex flex-row align-items-center btn-sm eliminarRecursUsuari' type='button' style='padding:7px 10px 12px'>"+
                        "<span class='align-self-center my-auto text-white'>-</span>"+
                    "</button></div>"+
                    "<div class='form-row'>"+
                        "<div class='form-group col-6'>"+
                            "<label for='tipusRecursUsuari"+recursosUsuari+"'>Tipus</label>"+
                            "<select name='tipusRecursUsuari"+recursosUsuari+"' id='tipusRecursUsuari"+recursosUsuari+"' style='border-radius:10px; margin-left:85px; ; width:200px;' class='tipusRecursUsuari'>"+
                                "<option value='0' selected>Selecciona el tipus</option>"+
                            "</select>"+
                        "</div>"+

                        "<div class='form-group col-6'>"+
                            "<label for='CodiRecursUsuari"+recursosUsuari+"'>Codi</label>"+
                            "<select name='CodiRecursUsuari"+recursosUsuari+"' id='CodiRecursUsuari"+recursosUsuari+"' style='border-radius:10px; margin-left:85px; ; width:200px;'>"+
                                "<option value=''>Selecciona un codi</option>"+
                            "</select>"+
                        "</div>"+
                    "</div>"+
                "</div>"
            ));
            actualitzarTipusRecursUsuari();
            $('#numRecursos').val(recursosUsuari);
        }

    });

    // Eliminar un recurs
    function eliminarRecursUsuari(){
        var id_recurs = $(this).attr("id").slice(-1);
        $('#recursUsuari'+id_recurs).remove();
        recursosUsuari = $('.recursUsuari').length;
        $('#numRecursos').val(recursosUsuari);
    }

    // Actualitzar el tipus de recurs de l'usuari
    function actualitzarTipusRecursUsuari(){
        $.get('/abp-broggi/public/api/tipusRecurs', function(data){
            var html_select = '<option value="">Selecciona el tipus</option>'
            for(var i=0; i<data.length; i++)
                html_select += '<option value="'+ data[i].id +'">'+ data[i].tipus +'</option>';
            $('#tipusRecursUsuari'+recursosUsuari).html(html_select);
        });
    }

    function actualitzarCodiUsuari(){
        var codi = $(this).val();
        var id_recurs = $(this).attr("id").slice(-1);
        // AJAX
        $.get('/abp-broggi/public/api/codiRecurs/'+ codi +'', function(data){
            var html_select = '<option value="">Selecciona un codi</option>'
            for(var i=0; i<data.length; i++)
                if(data[i].id_usuario == null){
                    html_select += '<option value="'+ data[i].id +'">'+ data[i].codi +'</option>';
                }
                console.log(html_select)
            $('#CodiRecursUsuari'+id_recurs).html(html_select);
        });
    }

    //Formulari nou recurs
    //Funcio per crear un nou codi
    function actualitzarCodiNou(){
        var codi;
        if($('#tipusRecursNou').val() == 1){
            codi = "Mike";
        }else if($('#tipusRecursNou').val() == 2){
            codi = "Indi";
        }else if($('#tipusRecursNou').val() == 3){
            codi = "Tang";
        }else
            codi = "Heli";
        var min = 10000;
        var max = 99999;
        var num = Math.floor(Math.random() * (max - min + 1)) + min;
        codi+= num;

        $('#codi').val(codi);
        $('#codi2').val(codi);
    }

});
