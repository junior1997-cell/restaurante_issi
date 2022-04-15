function init() {

    $("#guardar_registro").on('click', function(e){  $("#formulario_add_edit_cliente").submit(); });
    $("#formulario_add_edit_cliente").on("submit", function (e) { agregar_cliente(e); });

    listar_salas();

    listar_mesas('1');
}

init();

function listar_salas() {

    $("#salas_categorias").html('<i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>');

    $.post("CDelivery.php?op=listar_salas", {}, function (data, status) {

        data = JSON.parse(data);

        $("#salas_categorias").html('');

        var pintar = '';

        $.each(data, function (index, value) {

            value.stdo_list_default == '0' ? pintar = 'paint_select_span' : pintar = '';

            var salas = `<span class="categories ${pintar}" id="id_sala_${value.id_sala}" onclick="listar_mesas(${value.id_sala})">${value.nombre}</span>`;

            $("#salas_categorias").append(salas);
        });
    })
}

function listar_mesas(id_sala) {

    $("span").removeClass('paint_select_span');

    $("#id_sala_" + id_sala).addClass('paint_select_span');

    $("#mesas").html('<i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>');

    $.post("CDelivery.php?op=listar_mesas", { id_sala: id_sala }, function (data, status) {

        data = JSON.parse(data);

        // console.log(data);

        $("#mesas").html('');

        $("#productos").html('');

        $.each(data, function (index, value) {
            //console.log(value.nombre);
            var mesa = '' +
                '<a class="a_mesas"  style="text-decoration: none;color: black;" onclick="listar_categorias()" >' +
                '<div class="users-list-name " title="' + value.nombre + '" style="cursor:pointer;">' +
                '<div class="style_mesas">' +
                '<img src="../public/images/mesa.png" class="imagen_mesa">' +
                '</div>' +
                '<center><strong>' + value.nombre + '</strong></center>' +

                ' </div>' +
                '</a>' +
                '';
            $("#mesas").append(mesa);
        });
    })
}

function listar_categorias() {

    listar_productos('0');

    $('#salas_categorias').html('');

    $.post("CDelivery.php?op=listar_categorias", {}, function (data, status) {

        data = JSON.parse(data);

        var pintar = '';
        var home = '';
        var estado_home = true;

        $.each(data, function (index, value) {

            if (estado_home == true) {
                home = '<span class="categories paint_select_span" id="id_categoria_0" onclick="listar_productos(0)"><i class="fa fa-home"></i></span>'
                estado_home = false;
            } else {
                estado_home = false;
                home = '';
            }

            var categorias = `${home} <span class="categories ${pintar}" id="id_categoria_${value.id_categoria}" onclick="listar_productos(${value.id_categoria})">${value.nombre}</span>`;

            $("#salas_categorias").append(categorias);
        });
    })
}

function listar_productos(id_categoria) {

    $('#search_mesas_productos').attr('placeholder', 'Buscar productos');

    $("span").removeClass('paint_select_span');

    $("#id_categoria_" + id_categoria).addClass('paint_select_span');

    $("#mesas").html('<i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>');

    $.post("CDelivery.php?op=listar_producto", { id_categoria: id_categoria }, function (data, status) {

        data = JSON.parse(data);
        console.log(data);
        $("#mesas").html('');

        $("#productos").html('');

        if (data.length) {

            $.each(data, function (index, value) {

                var productos = '' +
                    '<div class="darkblue-panel pn" id="producto_'+value.id_producto+'" onclick="agregar_pedido('+value.id_producto+','+"'"+value.nombre_producto+"'"+',' + "'"+value.nombre_categoria +"'"+ ','+value.precio_soles+','+ value.stock+');" title="' + value.nombre_producto + ' | (' + value.nombre_categoria + ')">' +
                        '<div class="darkblue-header">' +
                            '<div id="proname" class="text-white">' + value.nombre_producto + '</div>' +
                        ' </div>' +
                        '<img src=" ../public/images/producto.png" class="rounded-circle" style="width:150px;height:134px;"> ' +
                        '<div class="mask">' +
                            '<a class="text-white">' +
                            '<strong>S/. </strong>' + value.precio_soles + '<br> $ ' + value.precio_dolar+'</a>' +
                            '<h5><i class="fa fa-bars"></i> ' + value.stock + '</h5>' +
                        '</div>'
                    '</div>';

                $("#productos").append(productos);
            });
        } else {
            $("#productos").html('<div class="alert alert-warning alert-dismissible fade show" role="alert" style=" height: 50px; ">' +
                '<strong>No hay registros!</strong> Puedes agregar productos desde tu administrador.' +
                '<button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
                '<span aria-hidden="true">&times;</span>' +
                '</button>' +
                '</div>')
        }
    })
}

function buscar_sunat_reniec() {

    $('#search').hide();

    $('#charge').show();

    let tipo_doc = $("#tipo_doc").val();

    let dni_ruc = $("#dni_ruc").val();

    if (tipo_doc == '1') {

        $('#tipo_doc').removeClass('is-invalid');

        if (dni_ruc.length == '8') {

            $.post("CDelivery.php?op=reniec", { dni: dni_ruc }, function (data, status) {
                data = JSON.parse(data);

                if (data.success == false) {

                    $('#search').show();

                    $('#charge').hide();

                    sw_error('Datos no encontrados en la RENIEC!!!');

                } else {

                    $('#search').show();

                    $('#charge').hide();

                    $("#nombre_razon_social").val(data.nombres);

                    $("#apellidos_nombre_comercial").val(data.apellidoMaterno + ' ' + data.apellidoPaterno);
                }
            })
        } else {

            $('#search').show();

            $('#charge').hide();

            sw_error('Asegurese de que el DNI tenga 8 dígitos!!!');
        }

    } else {

        if (tipo_doc == '2') {

            $('#tipo_doc').removeClass('is-invalid');

            if (dni_ruc.length == '11') {

                $.post("CDelivery.php?op=sunat", { ruc: dni_ruc }, function (data, status) {
                    data = JSON.parse(data);

                    if (data.success == false) {

                        $('#search').show();

                        $('#charge').hide();

                        sw_error('Datos no encontrados en la SUNAT!!!');
                    } else {

                        if (data.estado == 'ACTIVO') {

                            $('#search').show();

                            $('#charge').hide();

                            $("#nombre_razon_social").val(data.razonSocial);

                            data.nombreComercial == null ? $("#apellidos_nombre_comercial").val('-') : $("#apellidos_nombre_comercial").val(data.nombreComercial);

                            $("#direccion").val(data.direccion);
                        } else {

                            sw_advertencia('Se recomienda no generar BOLETAS o Facturas!!!');

                            $('#search').show();

                            $('#charge').hide();

                            $("#nombre_razon_social").val(data.razonSocial);

                            data.nombreComercial == null ? $("#apellidos_nombre_comercial").val('-') : $("#apellidos_nombre_comercial").val(data.nombreComercial);

                            $("#direccion").val(data.direccion);
                        }
                    }
                })
            } else {

                $('#search').show();

                $('#charge').hide();

                sw_error('Asegurese de que el RUC tenga 11 dígitos!!!');
            }
        } else {
            if (tipo_doc == '0') {

                $('#search').show();

                $('#charge').hide();

                sw_error('No necesita hacer consulta');
            } else {

                $('#tipo_doc').addClass('is-invalid');

                $('#search').show();

                $('#charge').hide();

                sw_error('Selecione un tipo de documento');
            }
        }
    }
}

// BUSCAR CLIENTE
$(function () {

    $("#search_cliente").autocomplete({
        source: function (request, response) {

            $.ajax({
                url: "CDelivery.php?op=buscar_cliente",
                type: 'post',
                dataType: "json",
                data: {
                    search_cliente: request.term.toUpperCase()
                },
                success: function (data) {
                    console.log(data);
                    response(data);
                }
            });
        },
        select: function (event, ui) {
            $('#search_cliente').val(ui.item.label); // display the selected text
            // $('#selectuser_id').val(ui.item.value); // save selected id to input
            return false;
        },
        focus: function (event, ui) {
            $("#search_cliente").val(ui.item.label);
            // $( "#selectuser_id" ).val( ui.item.value );
            return false;
        },
    });
});

function validacion_form() {
    if ($('#apellidos_nombre_comercial').val() == '' || $('#nombre_razon_social').val() == '' ) {
        $('#nombre_razon_social').addClass('is-invalid');
        $('#apellidos_nombre_comercial').addClass('is-invalid');
        return false;
    }else{
        $('#nombre_razon_social').removeClass('is-invalid');
        $('#apellidos_nombre_comercial').removeClass('is-invalid');
        return true;
    }

}

function agregar_cliente(e) {
    if ($('#apellidos_nombre_comercial').val() == '') {
         
         
    }else{
         
        e.preventDefault();
    
        var formData = new FormData($("#formulario_add_edit_cliente")[0]);
    
        $.ajax({
            url: "CDelivery.php?op=agregar_cliente",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function (datos) { 
                console.log(datos);
                if (datos == 'Resource id #5') {
    
                    sw_success('Cliente creado correctamente');
    
                    $("#modal_add_edit_cliente").modal("hide");
                    
                    limpiar_form_cliente();
    
                } else {
    
                    sw_error('Hubo errores al crear cliente, intentelo mas tarde, o comuniquese con TI');
                     
                }
            },
            xhr: function () {
                var xhr = new window.XMLHttpRequest();
                xhr.upload.addEventListener("progress", function (evt) {
                    if (evt.lengthComputable) {
                        var percentComplete = (evt.loaded / evt.total) * 100; 
                        $("#barra_progress").css({ "width": percentComplete + '%' });
                        $("#barra_progress").text(percentComplete + "%");
                        if (percentComplete === 100) {
                            setTimeout(reset_barra_progress, 600);
                        }
                    }
                }, false);
                return xhr;
            }
        });
    }
}

function reset_barra_progress() { 
    $("#barra_progress").css({ "width": '0%' });
    $("#barra_progress").text("0%");
}

function limpiar_form_cliente() {

    $('.form-control').removeClass("is-invalid"); // REMOVEMOS LOS INPUT MARCADOS EN ROJO

    $("#formulario_add_edit_cliente").trigger("reset");
}

function agregar_pedido(id_producto,producto,categoria,precio_soles,stock) {

    console.log(id_producto,producto,categoria,precio_soles,stock);

    $('.no-hay-detalle').hide(); //ocultamos el mesaje 'no hay detalle'

    if ( $('#producto_'+id_producto).hasClass('producto_selecionado') ) {

        suma_cant_productos(id_producto,precio_soles);        

    } else {

        $('#producto_'+id_producto).addClass('producto_selecionado');
        
        var lista = '<tr align="center" >'+
                        '<td>'+
                            '<button class="btn btn-info btn-sm" style="cursor: pointer;" onclick="" type="button">'+
                                '<span class="fa fa-minus"></span>'+
                            '</button>'+
                            '<input type="text" id="cant_ped_product_'+id_producto+'"  value="1"  style="width: 25px; height: 24px; border: #f0ad4e;" />'+
                            '<button class="btn btn-info btn-sm" style="cursor: pointer;" onclick="" type="button">'+
                                '<span class="fa fa-plus"></span>'+
                            '</button>'+
                        '</td>'+
                        '<td align="left">'+
                            '<h6>'+producto+'</h6>'+
                            '<small>('+categoria+')</small>'+
                        '</td>'+
                        '<td>'+
                            '<h6 >'+precio_soles+'</h6>'+
                        '</td>'+
                        '<td>'+
                            '<h6 >'+precio_soles+'</h6> <input type="hidden" name="cantidad[]" id="cantidad[]" >'+
                        '</td>'+
                        '<td>'+
                            '<button class="btn btn-dark btn-sm" style="cursor: pointer; color: #fff;" onclick="" type="button">'+
                            '<i class="far fa-trash-alt"></i>'+
                            '</button>'+
                        '</td>'+
                    '</tr>';
                    $('#lista_producto_pedido').append(lista);
        
    }
    
}

function suma_cant_productos(id_producto,precio_soles) {

    var cant_producto = $('#cant_ped_product_'+id_producto).val();
    var suma = parseInt(cant_producto, 10) + 1;
    var sub_total = parseInt(precio_soles,10) * cant_producto;
    console.log(suma);
    $('#cant_ped_product_'+id_producto).val(suma )
    $('#cant_ped_product_'+id_producto).html(suma )
}
 