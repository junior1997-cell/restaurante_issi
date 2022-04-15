function init() {
    listar_mesas('1');
    listar_salas();


};


function listar_salas() {

    $.post("CVenta.php?op=listar_salas", {}, function (data, status) {

        data = JSON.parse(data);

        var pintar = '';

        $.each(data, function (index, value) {

            value.stdo_list_default == '0' ? pintar = 'paint_select_span' : pintar = '';

            var salas = `<span class="categories ${pintar}" id="id_sala_${value.id_sala}" onclick="listar_mesas(${value.id_sala})">${value.nombre}</span>`;

            $("#salas_categorias").append(salas);
        });
    })
}

function listar_categorias() {

    listar_productos('0');

    $('#salas_categorias').html('');

    $.post("CVenta.php?op=listar_categorias", {}, function (data, status) {

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
    console.log('id: ' + id_categoria);

    $("span").removeClass('paint_select_span');

    $("#id_categoria_" + id_categoria).addClass('paint_select_span');

    $("#mesas_productos").html('<i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>');


    $.post("CVenta.php?op=listar_producto", { id_categoria: id_categoria }, function (data, status) {
        data = JSON.parse(data);
        console.log(data);
        $("#mesas_productos").html('');

        $("#productos").html('');

        var buscador = true;

        var codigo_buscador = '';

        $.each(data, function (index, value) {

            //console.log(value.nombre);
            if (buscador == true) {
                codigo_buscador = '<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12" style="margin-top: -30px;">' +
                    '<label class="control-label"></label>' +
                    '<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">' +
                    '<div class="form-group">' +
                    '<div class="input-group">' +
                    '<div class="input-group-prepend" style="background-color: #FFFFBF!important;">' +
                    '<button class="btn clase_buscador_icono"  type="button"><i class="fa fa-search"></i></button>' +
                    '</div>' +
                    '<input type="text" class="form-control clase_buscador_input" name="busquedaproductov" id="busquedaproductov" placeholder="Realice la Búsqueda del Producto por Nombre" style="color: black !important; font-weight: bold !important;" autocomplete="off" />' +
                    '<div class="invalid-feedback">Por favor escriba un nombre</div>' +
                    '</div>' +
                    '</div>' +
                    '</div >';
                buscador = false;
            } else {
                buscador = false;
                codigo_buscador = '';
            }
            var productos =''+
                '</div >' +
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
                '</div>' +
                '</div>' +
                '';
            $("#mesas_productos").append(codigo_buscador);
            $("#productos").append(productos);
        });
    })

}


function listar_mesas(id_sala) {
    $("span").removeClass('paint_select_span');

    $("#id_sala_" + id_sala).addClass('paint_select_span');

    $("#mesas_productos").html('<i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>');
    $.post("CVenta.php?op=listar_mesas", { id_sala: id_sala }, function (data, status) {
        data = JSON.parse(data);
        console.log(data);
        $("#mesas_productos").html('');
        $("#productos").html('');
        $.each(data, function (index, value) {
            //console.log(value.nombre);
            var mesa = '' +
                '<a class="a_mesas"  style="text-decoration: none;color: black;" onclick="listar_categorias()" >' +
                '<div class="users-list-name " title="' + value.nombre + '" style="cursor:pointer;">' +
                '<div>' +
                '<div class="style_mesas">' +
                '<img src="../public/images/mesa.png" class="imagen_mesa">' +
                '</div>' +
                ' </div>' +
                '<center><strong>' + value.nombre + '</strong></center>' +

                ' </div>' +
                '</a>' +
                '';
            $("#mesas_productos").append(mesa);
        });
    })

}


init();