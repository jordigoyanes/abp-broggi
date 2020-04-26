$( document ).ready(function() {

    $(function(){
        //Formulari incidencia
        $('#provinciaIncidencia').on('change', actualitzarComarca);
        $('#comarcaIncidencia').on('change', actualitzarMunicipi);

        $('#CentreSanitari').on('change', actualitzarCamps);
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
    });

    //Formulari incidencia
    var afectats = $('.afectat').length;
    var recursos = $('.recurs').length;



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
        // AJAX
        // $.get('http://localhost:80/abp-broggi/public/api/comarca/'+ '', function(data){
            $.get('http://broggi.lo:8888/public/api/provincies', function(data){
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
        //$.get('http://localhost:80/abp-broggi/public/api/comarca/'+ id_provincia +'', function(data){
        $.get('http://broggi.lo:8888/public/api/comarca/'+ id_provincia +'', function(data){
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
        // AJAX
        //$.get('http://localhost:80/abp-broggi/public/api/municipi/'+ comarques_id +'', function(data){
        $.get('http://broggi.lo:8888/public/api/municipi/'+ comarques_id +'', function(data){
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
    function actualitzarCamps() {
        var id = $(this).val();
        // AJAX
        // $.get('http://localhost:80/abp-broggi/public/api/centreid/'+ id +'', function(data){
        $.get('http://broggi.lo:8888/public/api/centreid/'+ id +'', function(data){
            var Nom = '<option value="'+ data[0].id +'">'+ data[0].nom +'</option>';
            var telefon = '<option value="'+ data[0].id +'">'+ data[0].telefon +'</option>';
            var direccio = '<option value="'+ data[0].id +'">'+ data[0].adreca +'</option>';
            $('#centreSanitari').html(Nom);
            $('#telefonCentre').html(telefon);
            $('#adreçaCentre').html(direccio);
        });
    }

    function crearCentre(){
        var id = $(this).val();
        if(id == 1){
            $(".hidden1").removeClass("hidden1");
            $("#nomAlertant").addClass("hidden2");
            $("#cognomAlertant").addClass("hidden2");
            $("#adreçaAlertant").addClass("hidden2");
            $("#telefonAlertant").addClass("hidden2");
            $(".amagar").css("display", "none");
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
            $(".amagar").css("display", "flex");
        }
    }

    function actualitzarCentre(){
        var id = $(this).val();
        // AJAX
        if(id == 1){
            // $.get('http://localhost:80/abp-broggi/public/api/centre/'+ id +'', function(data){
            $.get('http://broggi.lo:8888/public/api/centre/'+ id +'', function(data){
            var html_select = '<option value="">Selecciona un Centre</option>'
            for(var i=0; i<data.length; i++)
                html_select += '<option value="'+ data[i].id +'">'+ data[i].nom +'</option>';
            $('#CentreSanitari').html(html_select);
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
                    "<div id='brossaAfectat"+afectats+"' class='d-flex justify-content-end eliminarAfectat'><div class='rounded-circle bg-white d-flex justify-content-center' style='width:40px; height:40px'><img src='../img/delete2.png' class='w-50 my-auto'></div></div>"+
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
            $(".hidden").removeClass("hidden");
        }
        if(te_tarjeta == '2'){
            $("#cip"+id_afectat).addClass("hidden");
        }
    }

    //Actualitzar el select de provincies al crear un afectat nou
    function actualitzarProvinciaAfectat(){
        // AJAX
        // $.get('http://localhost:80/abp-broggi/public/api/provincies', function(data){
            $.get('http://broggi.lo:8888/public/api/provincies', function(data){
            var html_select = '<option value="">Selecciona una provincia</option>'
            for(var i=0; i<data.length; i++)
                html_select += '<option value="'+ data[i].id +'">'+ data[i].nom +'</option>';
            $('#provinciaAfectat'+afectats).html(html_select);
        });
    }

    // Actualitzar el select de comarques quan es tria la provincia
    function actualitzarComarcaAfectat() {
        var id_provincia = $(this).val();
        var id_afectat = $(this).attr("id").slice(-1);
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
                    "<div id='brossaRecurs"+recursos+"'class='d-flex justify-content-end eliminarRecurs'><div class='rounded-circle bg-white d-flex justify-content-center' style='width:40px; height:40px'><img src='../img/delete2.png' class='w-50 my-auto'></div></div>"+
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
                            "<label for='CodiRecurs"+recursos+"'>Codi</label>"+
                            "<select name='CodiRecurs"+recursos+"' id='CodiRecurs"+recursos+"' style='border-radius:10px; margin-left:85px; ; width:200px;'>"+
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
            actualitzarTipusRecurs();
            $('#numRecursos').val(recursos);
        }
    })

    function actualitzarTipusRecurs(){
        $.get('http://broggi.lo:8888/public/api/tipusRecurs', function(data){
            var html_select = '<option value="">Selecciona el tipus</option>'
            for(var i=0; i<data.length; i++)
                html_select += '<option value="'+ data[i].id +'">'+ data[i].tipus +'</option>';
            $('#tipusRecurs'+recursos).html(html_select);
        });
    }

    function actualitzarCodi(){
        var codi = $(this).val();
        var id_recurs = $(this).attr("id").slice(-1);
        // AJAX
        // $.get('http://localhost:80/abp-broggi/public/api/codiRecurs/'+ codi +'', function(data){
        $.get('http://broggi.lo:8888/public/api/codiRecurs/'+ codi +'', function(data){
            var html_select = '<option value="">Selecciona un codi</option>'
            for(var i=0; i<data.length; i++)
                html_select += '<option value="'+ data[i].id +'">'+ data[i].codi +'</option>';
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
                    "<div id='brossaRecurs"+recursosUsuari+"'class='d-flex justify-content-end eliminarRecursUsuari'><div class='rounded-circle bg-white d-flex justify-content-center' style='width:40px; height:40px'><img src='../img/delete2.png' class='w-50 my-auto'></div></div>"+
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
        $.get('http://broggi.lo:8888/public/api/tipusRecurs', function(data){
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
        // $.get('http://localhost:80/abp-broggi/public/api/codiRecurs/'+ codi +'', function(data){
        $.get('http://broggi.lo:8888/public/api/codiRecurs/'+ codi +'', function(data){
            var html_select = '<option value="">Selecciona un codi</option>'
            for(var i=0; i<data.length; i++)
                if(data[i].id_usuario == null){
                    html_select += '<option value="'+ data[i].id +'">'+ data[i].codi +'</option>';
                }
                console.log(html_select)
            $('#CodiRecursUsuari'+id_recurs).html(html_select);
        });
    }

});
