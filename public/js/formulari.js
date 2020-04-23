$( document ).ready(function() {

    var afectats= $('.afectat').length;
    console.log(afectats);

    // Afegir afectat(es poden afegir fins a 9)
    $('#afegirAfectat').on('click', function(){
        if(afectats<9){
            afectats++;
            $('.afectats').append($(
                "<div class='card-subbody card-subbody-formulari afectat' style='border-top: solid 1px black'>"+
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
                            "<label for='provinciaAfectat'>Provincia</label>"+
                                "<select name='provinciaAfectat' id='provinciaAfectat' style='border-radius:10px; margin-left:50px; ; width:130px;'>"+
                                    "<@foreach ($provincies as $provincia)"+

                                            "<option value='{{ $provincia->id }}' selected> {{ $provincia->nom }} </option>"+

                                    "@endforeach"+
                                "</select>"+
                        "</div>"+

                        "<div class='form-group col-md-4 col-sm-4'>"+
                            "<label for='comarcaAfectat' style='margin-left:10px;'>Comarca</label>"+
                            "<select name='comarcaAfectat' id='comarcaAfectat' style='border-radius:10px; margin-left:60px;  width:180px;'>"+
                                "<option value=''>Selecciona una Comarca</option>"+
                            "</select>"+
                        "</div>"+

                        "<div class='form-group col-md-5 col-sm-4'>"+
                            "<label for='municipiAfectat'>Municipi</label>"+
                            "<select name='municipiAfectat' id='municipiAfectat' style='border-radius:10px; margin-left:70px; ; width:290px;'>"+
                                    "<option value=''>Selecciona una Municipi</option>"+
                            "</select>"+
                        "</div>"+
                    "</div>"+

                "</div>"

            ));

            console.log(afectats);

            $(function(){
                $('.tenirTarjeta').on('change', crearCip);
            });
            function crearCip(){
                var te_tarjeta = $(this).val();
                var id_afectat = $(this).attr("id").slice(-1);
                console.log("id del afectat: "+id_afectat);
                console.log("as.jcsa");
                if(te_tarjeta == '1'){
                    $(".hidden").removeClass("hidden");
                }
                if(te_tarjeta == '2'){
                    $("#cip"+id_afectat).addClass("hidden");
                }
            }
        }
    });

    $(function(){
        $('.tenirTarjeta').on('change', crearCip);
    });
    function crearCip(){
        var te_tarjeta = $(this).val();
        var id_afectat = $(this).attr("id").slice(-1);
        console.log("id del afectat: "+id_afectat);
        console.log("as.jcsa");
        if(te_tarjeta == '1'){
            $(".hidden").removeClass("hidden");
        }
        if(te_tarjeta == '2'){
            $("#cip"+id_afectat).addClass("hidden");
        }
    }

    $(function(){
        $('#provinciaAfectat').on('change', actualitzarComarca2);
    });
    function actualitzarComarca2() {
        var id_provincia = $(this).val();
        // AJAX
        // $.get('http://localhost:80/abp-broggi/public/api/comarca/'+ id_provincia +'', function(data){
            $.get('http://broggi.lo:8888/public/api/comarca/'+ id_provincia +'', function(data){
            var html_select = '<option value="">Seleccioni una comarca</option>'
            for(var i=0; i<data.length; i++)
                html_select += '<option value="'+ data[i].id +'">'+ data[i].nom +'</option>';
                console.log(html_select);
            $('#comarcaAfectat').html(html_select);
        });
    }

    $(function(){
        $('#comarcaAfectat').on('change', actualitzarMunicipi2);
    });
    function actualitzarMunicipi2(){
        var comarques_id = $(this).val();
        // AJAX
        //$.get('http://localhost:80/abp-broggi/public/api/municipi/'+ comarques_id +'', function(data){
        $.get('http://broggi.lo:8888/public/api/municipi/'+ comarques_id +'', function(data){
        var html_select = '<option value="">Seleccioni un Municipi</option>'
        for(var i=0; i<data.length; i++)
            html_select += '<option value="'+ data[i].id +'">'+ data[i].nom +'</option>';
        $('#municipiAfectat').html(html_select);
        });
    }
});
