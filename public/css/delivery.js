function init() {

    $("#formulario_carousel").on("submit", function (e) { guardaryeditar(e); });

    listar_salas();

    listar_mesas('1');
}

init();  

function listar_salas() {

    $.post("CDelivery.php?op=listar_salas", {}, function (data, status) {

        data = JSON.parse(data);

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

    $('#search_mesas_productos').attr('placeholder','Buscar productos');
    
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
                         
                var productos =''+                     
                '<div class="darkblue-panel pn" title="LOMITO DE RES | (ASADOS)">' +
                    '<div class="darkblue-header">' +
                    '<div id="proname" class="text-white">' + value.nombre + '</div>' +
                    ' </div>' +
                    '<img src=" ../public/images/producto.png" class="rounded-circle" style="width:150px;height:134px;"> <input type="hidden" id="category" name="category" value="ASADOS">' +
                    '<div class="mask">' +
                    '<a class="text-white">' +
                    '<strong>S/</strong>' + value.precio_soles + '<br>' +
                    '$9.41 </a>' +
                    '<h5><i class="fa fa-bars"></i> 110.00</h5>' +
                '</div>';
                
                $("#productos").append(productos);
            });
        } else {
             $("#productos").html('<div class="alert alert-warning alert-dismissible fade show" role="alert" style=" height: 50px; ">'+
                                    '<strong>No hay registros!</strong> Puedes agregar productos desde tu administrador.'+
                                    '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'+
                                    '<span aria-hidden="true">&times;</span>'+
                                    '</button>'+
                                '</div>')
        }
    })
}