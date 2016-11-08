$( document ).ready(function() {

    var cfc = '';
    var f = new Date();
    var dia = f.getDate();
    var mes = f.getMonth()+1;
    if(mes<10){
        cfc='0';
    }
    if(dia<10){
        cfd='0';
    }
    var ano = f.getFullYear();
    var fecha = cfd+dia+'/'+cfc+mes+'/'+ano;
    $('#fc_venta').text(fecha);


     // EVENTO AUTOCOMPLETE DE clientes
    $(document).on('keypress keyup','#npt_vent',function(){

        var nom_ctl = $(this).val();
        var token = $('#token').val();
        var ruta = 'http://localhost:8000/tcliente/'+nom_ctl;
        
        if (nom_ctl.length>=3){
            var list = "";
            $.ajax({
                url: ruta,
                headers: {'X-CSRF-TOKEN':token},
                type: 'GET',
                dataType: 'json',
                data: {},
                success:function(autocomplete){
                    $.each(autocomplete,function(index, value){
                        list = '<li class="ctl_slc" data-idctl="'+value.id_cliente+'" data-rfc ="'+value.rfc+'" tabindex="1">'+value.nombre+' '+value.apellidoP+' '+value.apellidoM+'</li>'+list;
                    });

                    $('#list_ctl').html(list);
                },
                error:function(error){
                    console.log(error);
                }
            });
            
        }
        else{
            $('#list_ctl').html('');
        }
       
    });

    //al hacer click sobre algun elemento de los clientes del autocomplete
    $(document).on('click','.ctl_slc',function(){
        var srfc = $(this).data('rfc');
        var sidclt = $(this).data('idctl');
        var cero = ''
        if(sidclt>=10 & sidclt<100){
            cero = '00';
        }
        else if(sidclt>=100 & sidclt<1000){
            cero = '0';
        }
        else if(sidclt>=1000){
            cero = '';
        }
        else{
            cero = '000'; 
        }
        $('#npt_vent').val( cero+sidclt+'-'+$(this).text());
        $('#vtn_rfc').text('R.F.C.: '+srfc);
        $('#idctl_ag').val(sidclt);
        $('#list_ctl').html('');

    });

    // EVENTO AUTOCOMPLETE DE articulos
    $(document).on('keypress keyup','#npta_vent',function(e){
        var nom_art = $(this).val();
        var token = $('#token').val();
        var ruta = 'http://localhost:8000/tcart/'+nom_art;
        
        if (nom_art.length>=3){
            var list = "";
            $.ajax({
                url: ruta,
                headers: {'X-CSRF-TOKEN':token},
                type: 'GET',
                dataType: 'json',
                data: {},
                success:function(autocomplete){
                    $.each(autocomplete,function(index, value){
                        list = '<li class="art_slc" data-idart="'+value.id_articulo+'" tabindex="1">'+value.descripcion+'</li>'+list;
                    });

                    $('#list_art').html(list);
                },
                error:function(error){
                    console.log(error);
                }
            });
            
        }
        else{
            $('#list_art').html('');
        }
       
    });

    //al hacer click sobre algun elemento de los articulos del autocomplete
    $(document).on('click','.art_slc',function(){

        $('#npta_vent').val( $(this).text());
        $('#idart_ag').val($(this).data('idart'));
        $('#list_art').html('');

    });

    //al hacer click se agrega articulo a la lista de venta
    $(document).on('click','#agrega_producto',function(){

        var obidp = $('#idart_ag').val();
        if(obidp != ''){
            var token = $('#token').val();
            var ruta = 'http://localhost:8000/tccompra/'+obidp;

            var tasa = 0;
            var enganche = 0;
            var plazo = 0;

            var precio = 0;
            var importe = 0;

            $.ajax({
                url:ruta,
                headers: {'X-CSRF-TOKEN':token},
                type:"GET",                                                                            
                dataType: "json",
                data:{},
                success: function(response){
                    $.each(response,function(index, value){
                        
                        if (response.id_articulo != '')
                        {
                            var ruta2 = 'http://localhost:8000/tcconf'

                            $.ajax({
                                url:ruta2,
                                headers: {'X-CSRF-TOKEN':token},
                                type:"POST",                                                                            
                                dataType: "json",
                                data: {},
                                success: function(response2){
                                    $.each(response2,function(index2, value2){
                                        if (response2.id_conf != '')
                                        {
                                            tasa = value2.tasa_financiamiento;
                                            enganche = value2.enganche;
                                            plazo = value2.plazo_max;
                                            precio = Math.round(value.precio*(1+(tasa*plazo)/100));
                                            importe = precio;
                                            $('#lista_ventas thead').append('<tr id="'+obidp+'" data-articulo=""><td width="39%">'+value.descripcion+'</td><td width="15%">'+value.modelo+'</td><td width="10%"><input class="cant_pro form-control snumero" value="1" type="text"></td><td width="15%" data-precio="">'+precio+'</td><td width="15%" id="imp'+obidp+'" data-importe="">'+importe+'</td><td width="5%"><div class=""><button class="btn btn_mod borra_venta" value="3"><span id="dlt_venta" class="glyphicon glyphicon-remove-circle"></span></button></div></td></tr>');

                                            
                                        }
                                        else 
                                            console.log(response.respuesta);
                                    });
                                },
                                error:function(error){
                                    console.log(error);
                                }

                            });
                        }
                        else 
                            swal({title: "",   text: "El articulo selecionado no cuenta con existencia, favor de verificar",   timer: 2000,   showConfirmButton: false });
                    });
                },
                error:function(error){
                    console.log(error);
                }

            });
            $('#npta_vent').val('');
            setTimeout(function(){
                sumaImporte();
                $('#obj_venta #'+obidp+' .cant_pro').focus();
            },500);
            $('#idart_ag').val('');
        }


    });

    $(document).on('change','.cant_pro',function(){
        var elemento = $(this);
        var cantidad = $(this).val();
        var padre = $(this).parent().parent().attr('id');

        var token = $('#token').val();
        var ruta = 'http://localhost:8000/tcvalpro/'+padre;

        $.ajax({
            url:ruta,
            headers: {'X-CSRF-TOKEN':token},
            type:"GET",                                                                            
            dataType: "json",
            data: {},
            success: function(response){
                $.each(response,function(index, value){
                    if (value.id_articulo != '')
                    {
                        if (cantidad > value.existencia){
                            swal({title: "Advertencia",   text: "no cuenta con esa cantidad de este articulo, usted cuenta con "+value.existencia+" .",   timer: 2000,   showConfirmButton: false });
                            $(elemento).val(value.existencia);
                        }
                    }
                    else 
                        console.log(response.respuesta);
                });
            },
            error:function(error){
                console.log(error);
            }

        });
        var cimporte = eval($('#'+padre+' [data-precio]').text())*cantidad;
        $('#'+padre+' [data-importe]').text(cimporte);
        sumaImporte();

    });
    // funciona para quitar un elemento de la lista de compra
    $(document).on('click','.borra_venta',function(){
        var padre = $(this).parent().parent().parent().attr('id');
        $('tr#'+padre).remove();
        sumaImporte();
    });
    //valida que exista informacion de usuario y articulos en la lista para mostras los resultados
    $(document).on('click','#sig_venta',function(){
        if(validaCliente() & validaVentas()){
            var ruta = 'http://localhost:8000/tcconf'
            var token = $('#token').val();

            var tasa = 0;
            var enganche = 0;
            var plazoMax = 0;
            var precioContado = 0;
            var totalAdeudo = eval($('#total_venta').text());
            var totalpagart = 0;
            var totalpagars = 0;
            var totalpagarn = 0;
            var totalpagard = 0;
            var importepagrt = 0;
            var importepagrs = 0;
            var importepagrn = 0;
            var importepagrd = 0;
            var ahorrot = 0;
            var ahorros = 0;
            var ahorro9 = 0;
            var ahorrod = 0;
            var parametros = 'opc=obtenconf';

            $.ajax({
                url:ruta,
                headers: {'X-CSRF-TOKEN':token},
                type:"POST",                                                                            
                dataType: "json",
                data: {},
                success: function(response2){
                    $.each(response2,function(index, value){
                        if (value.id_conf != '')
                        {

                            tasa = value.tasa_financiamiento;
                            enganche = value.enganche;
                            plazoMax = value.plazo_max;
                            //para sacar precio contado
                            precioContadop = totalAdeudo/(1+((tasa*plazoMax)/100));
                            precioContado = Math.round(precioContadop* 100) / 100;

                            //total a pagar meses
                            totalpagart = Math.round((precioContado*(1+(tasa*3)/100))*100)/100;
                            totalpagars = Math.round((precioContado*(1+(tasa*6)/100))*100)/100;
                            totalpagarn = Math.round((precioContado*(1+(tasa*9)/100))*100)/100;
                            totalpagard = totalAdeudo;

                            //importe de abonos
                            importepagrt = Math.round((totalpagart / 3)*100)/100;
                            importepagrs = Math.round((totalpagars / 6)*100)/100;
                            importepagrn = Math.round((totalpagarn / 9)*100)/100;
                            importepagrd = Math.round((totalpagard / 12)*100)/100;

                            //lo que se ahorra en dif plazos
                            ahorrot = Math.round((totalAdeudo-totalpagart)*100)/100;
                            ahorros = Math.round((totalAdeudo-totalpagars)*100)/100;
                            ahorron = Math.round((totalAdeudo-totalpagarn)*100)/100;
                            ahorrod = Math.round((totalAdeudo-totalpagard)*100)/100;

                            $('#abonomt').text('$'+totalpagart);
                            $('#totalpt').text('TOTAL A PAGAR $'+importepagrt);
                            $('#ahorromt').text( 'SE AHORRA $'+ahorrot);

                            $('#abonoms').text('$'+totalpagars);
                            $('#totalps').text('TOTAL A PAGAR $'+importepagrs);
                            $('#ahorroms').text( 'SE AHORRA $'+ahorros);

                            $('#abonomn').text('$'+totalpagarn);
                            $('#totalpn').text('TOTAL A PAGAR $'+importepagrn);
                            $('#ahorromn').text( 'SE AHORRA $'+ahorron);

                            $('#abonomd').text('$'+totalpagard);
                            $('#totalpd').text('TOTAL A PAGAR $'+importepagrd);
                            $('#ahorromd').text( 'SE AHORRA $'+ahorrod);

                            $('.opc_abono').css('display','block');
                            $('#guarda_venta').css('visibility','visible');
                            $('#sig_venta').css('visibility','hidden');

                            
                        }
                        else 
                            console.log(response.respuesta);
                    });
                },
                error:function(error){
                    console.log(error);
                }

            });
        }
        else
            swal({title: "",   text: "Favor de realizar alguna compra para continuar, gracias",   timer: 2000,   showConfirmButton: false });


    });

    $(document).on('click','#guarda_venta',function(){
        if(validaPlazos()){

            var idctlg = $('#idctl_ag').val();
            var cant_total = eval($('#total_venta').text());
            var fc_sis = $('#fc_venta').text();
            var diag = fc_sis.substring(0,2);
            var mesg = fc_sis.substring(3,5);
            var anog = fc_sis.substring(6,10);
            var fechag = anog+'-'+mesg+'-'+diag;

            var token = $('#token').val();
            var ruta = 'http://localhost:8000/tcventa/'+idctlg+'/'+cant_total+'/'+anog+'/'+mesg+'/'+diag;

            $.ajax({
                url:ruta,
                headers: {'X-CSRF-TOKEN':token},
                type:"GET",                                                                            
                dataType: "json",
                data: {},
                success: function(response){
                    if (response == '1')//== true)
                    {
                        swal({title: "Venta Guardada",   text: "La venta se guardo correctamente.",   timer: 2000,   showConfirmButton: false });
                        descuentaProducto();
                        swal({title: "",   text: "Bien Hecho, Tu venta ha sido registrada correctamente”",   timer: 2000,   showConfirmButton: false });
                    }
                    else{
                        console.log(response.respuesta);
                        swal({title: "",   text: "Ocurrio un erros al momento de registrar la venta, favor de reintentar",   timer: 2000,   showConfirmButton: false });
                    } 


                    $('#npt_vent').val('');
                    $('#idctl_ar').val('');
                    $('#npta_vent').val('');
                    $('#idart_ag').val('');
                    $('#vtn_rfc').text('');
                    $('#lista_ventas thead').html('');
                    sumaImporte();
                },
                error:function(error){
                    console.log(error);
                }

            });

            
        }
        else 
            swal({title: "",   text: "Debe seleccionar un plazo para realizar el pago de su compra",   timer: 2000,   showConfirmButton: false });
    });

    $(document).on('click','#cancela_venta',function(){
        $('#npt_vent').val('');
        $('#idctl_ar').val('');
        $('#npta_vent').val('');
        $('#idart_ag').val('');
        $('#vtn_rfc').text('');
        $('#lista_ventas thead').html(' ');
    });

    $(document).on('keydown','.snumero',function (e) {
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
            (e.keyCode == 65 && e.ctrlKey === true) || 
            (e.keyCode >= 35 && e.keyCode <= 39)) {
                 return;
        }
 
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });


});


function sumaImporte(){

    var cantidad_total = 0;
    $("[data-importe]").each(function(index,value){
        cantidad_total = cantidad_total + eval($(this).text());
    });
    calculaEnganche(cantidad_total);
}

function calculaEnganche(cantidad_total){
    var ruta = 'http://localhost:8000/tcconf'
    var token = $('#token').val();

    var tasa = 0;
    var enganche = 0;
    var plazo = 0;
    var tenganche = 0; 
    var bonificacion = 0;


    $.ajax({
        url:ruta,
        headers: {'X-CSRF-TOKEN':token},
        type:"POST",                                                                            
        dataType: "json",
        data: {},
        success: function(response2){
            $.each(response2,function(index, value){
                if (value.id_conf != '')
                {
                    tasa = value.tasa_financiamiento;
                    enganche = value.enganche;
                    plazo = value.plazo_max;
                    tenganche = (enganche/100)*cantidad_total;
                    bonificacion = tenganche*((tasa*plazo)/100);
                    timporte = cantidad_total-tenganche-bonificacion;
                    $('#enganche_venta').text(Math.round(tenganche*100)/100);
                    $('#bonificacion_venta').text(Math.round(bonificacion*100)/100);
                    $('#total_venta').text((Math.round(timporte*100)/100));

                    Math.round(num * 100) / 100

                }
                else 
                    console.log(response.respuesta);
            });
        },
        error:function(error){
            console.log(error);
        }

    });

}

function validaCliente(){
    var vcliente =$('#idctl_ag').val(); 
    if(vcliente != 0){
        return true;
    }
     else{
        return false;
    }
}

function validaVentas(){
    var varticulos = $('#obj_venta').find('tr').length;
    if(varticulos != 0){
        return true;
    }
    else{
        return false;
    }
}

function validaPlazos(){

    var res = false;

    $("[data-abono]").each(function(index,value){

        if ($(this).is(':checked')){
            res = true;
        }
    });

    return res;

}

function descuentaProducto(){
    $("[data-articulo]").each(function(index,value){
        var idartd = $(this).attr('id');
        var cantartd = $('#obj_venta #'+idartd+' td .cant_pro').val();

        var token = $('#token').val();
        var ruta = 'http://localhost:8000/tcdescprod/'+idartd;
        var existencia = 0;
        var result = 0;

        $.ajax({
            url:ruta,
            headers: {'X-CSRF-TOKEN':token},
            type:"GET",                                                                            
            dataType: "json",
            data: {},
            success: function(response){
                $.each(response,function(index, value){
                    existencia = value.existencia;
                    result  = existencia-cantartd;

                    var ruta2 = 'http://localhost:8000/tcdescproducto/'+idartd+'/'+result;
                    $.ajax({
                        url:ruta2,
                        headers: {'X-CSRF-TOKEN':token},
                        type:"GET",                                                                            
                        dataType: "json",
                        data: {},
                        success:function(response2){
                            $.each(response2,function(index2, value2){
                                if(response == '1'){
                                    console.log('se logro actualizar');
                                }
                            });
                        },
                        error:function(error){
                            console.log(error);
                        }
                    });
                });
            },
            error: function(error){
                console.log(error);
            }

        });

    });

}












