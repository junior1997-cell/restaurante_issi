<!DOCTYPE html>
<html lang="es">

<head>
    <?php require '../vistas/header.php'; ?>
    <link href="../public/buscador/jquery-ui.min.css" rel="stylesheet" type="text/css" />
</head>

<body>
    <div style="padding: 11px 30px;">
        <h5 class="font-medium text-uppercase mb-0"><i class="fa fa-tasks"></i> Gestión de Ventas</h5>
    </div>
    <div class="container-fluid contenido">
        <div class="row">
            <!-- .......::::::::::::::: CARD GESTION DE VENTAS ::::::::::::::::....... -->
            <div class="col-12 col-sm-12 col-md-12 col-lg-5 col-xl-5 col-xxl-5 cardpequeño">
                <div class="card clasecard">
                    <div class="card-header colorcarhead">
                        <h4 class="card-title text-white stiloh4"><i class="fas fa-pencil"></i> Gestión de Ventas</h4>
                    </div>
                    <div class="card-body" style="padding-top: 5px !important;">
                        <div class="row">
                            <!-- BUSCADOR DE CLIENTES -->
                            <div class="col-md-12" style="padding-top: 20px !important;">
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend" style="background-color: #ffffbf !important;">
                                            <span class="input-group-text"><i class="fa fa-search"></i></span>
                                        </div>
                                        <input type="text" name="search_cliente" id="search_cliente" class="form-control" style="background-color: #ffffbf; border-bottom-right-radius: 5px; border-top-right-radius: 5px;" placeholder="Buscar gestion" style="color: black !important; font-weight: bold !important;" autocomplete="off" />
                                        <div class="input-group-prepend" style="cursor: pointer;" data-toggle="modal" data-target="#modal_add_edit_cliente" onclick="limpiar_form_cliente();">
                                            <span class="input-group-text"><i class="fas fa-user-plus"></i></span>
                                        </div>
                                        <div class="invalid-feedback">Por favor escriba un nombre</div>
                                    </div>
                                </div>
                            </div>
                            <!-- TABLA DE PEDIDO DE  PRODUCTOS -->
                            <div class="col-md-12">
                                 
                                <div class="table-responsive m-t-10">
                                    <table id="carrito" class="table table-hover">
                                        <thead>
                                            <tr class="text-center">
                                                <th style="height: 20px !important; margin: 0 !important; padding: 0 !important; line-height: 2 !important;">Cantidad</th>
                                                <th style="height: 20px !important; margin: 0 !important; padding: 0 !important; line-height: 2 !important;">Descripción</th>
                                                <th style="height: 20px !important; margin: 0 !important; padding: 0 !important; line-height: 2 !important;">Precio</th>
                                                <th style="height: 20px !important; margin: 0 !important; padding: 0 !important; line-height: 2 !important;">Importe</th>
                                                <th style="height: 20px !important; margin: 0 !important; padding: 0 !important; line-height: 2 !important;"></th>
                                            </tr>
                                        </thead>
                                        <tbody id="lista_producto_pedido">                                                                                        
                                            <tr class="no-hay-detalle">
                                                <td class="text-center" colspan="5">
                                                    <h4>NO HAY DETALLES AGREGADOS</h4>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group has-feedback">
                                            <input class="form-control" type="text" name="observacionespedido" id="observacionespedido" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Ingrese Observaciones de Pedido" />
                                        </div>
                                    </div>
                                </div>
                                <div class="table-responsive m-t-10">
                                    <table id="carritototal" class="table-responsive">
                                        <tbody>
                                            <tr>
                                                <td width="20"></td>
                                                <td width="250">
                                                    <h6 class="text-right"><label>Gravado 18.00%:</label></h6>
                                                </td>

                                                <td width="250">
                                                    <h6 class="text-right"><strong>S/</strong><label id="lblsubtotal" name="lblsubtotal">0.00</label></h6>
                                                    <input type="hidden" name="txtsubtotal" id="txtsubtotal" value="0.00" />
                                                </td>

                                                <td width="250">
                                                    <h6 class="text-right"><label>Exento 0%:</label></h6>
                                                </td>

                                                <td width="250">
                                                    <h6 class="text-right"><strong>S/</strong><label id="lblsubtotal2" name="lblsubtotal2">0.00</label></h6>
                                                    <input type="hidden" name="txtsubtotal2" id="txtsubtotal2" value="0.00" />
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>
                                                    <h6 class="text-right">
                                                        <label>IGV 18.00%:<input type="hidden" name="iva" id="iva" autocomplete="off" value="18.00" /></label>
                                                    </h6>
                                                </td>

                                                <td>
                                                    <h6 class="text-right"><strong>S/</strong><label id="lbliva" name="lbliva">0.00</label></h6>
                                                    <input type="hidden" name="txtIva" id="txtIva" value="0.00" />
                                                </td>

                                                <td>
                                                    <h6 class="text-right">
                                                        <label>Desc. 0.00%:<input type="hidden" name="descuento" id="descuento" value="0.00" /></label>
                                                    </h6>
                                                </td>

                                                <td>
                                                    <h6 class="text-right"><strong>S/</strong><label id="lbldescuento" name="lbldescuento">0.00</label></h6>
                                                    <input type="hidden" name="txtDescuento" id="txtDescuento" value="0.00" />
                                                </td>
                                            </tr>
                                            <tr style="background-color: #444; color: #00ff00;">
                                                <td></td>
                                                <td colspan="2">
                                                    <h4 class="text-left" style="padding: 0 !important; margin: 0 !important; line-height: 1.7;">
                                                        <label style="padding: 0 !important; margin: 0 !important; font-size: 20px;">&nbsp;TOTAL A PAGAR:</label>
                                                    </h4>
                                                </td>
                                                <td colspan="2">
                                                    <h4 class="text-right" style="padding: 0 !important; margin: 0 !important; line-height: 1.7; font-size: 20px;">
                                                        <strong>S/</strong><label id="lbltotal" name="lbltotal" style="padding: 0 !important; margin: 0 !important; font-size: 20px; padding-right: 6px !important;">0.00</label>
                                                    </h4>
                                                    <input type="hidden" name="txtTotal" id="txtTotal" value="0.00" />
                                                    <input type="hidden" name="txtTotalCompra" id="txtTotalCompra" value="0.00" />
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- .......::::::::::::::: CARD MESAS-PRODUCTOS ::::::::::::::::....... -->
            <div class="col-12 col-sm-12 col-md-12 col-lg-7 col-xl-7 col-xxl-7 cardgrande">
                <div class="card clasecard">
                    <div class="card-header colorcarhead">
                        <h4 class="card-title text-white stiloh4"><i class="fa fa-tasks"></i> Mesas/Productos</h4>
                    </div>
                    <div class="card-body">
                        <div class="row-horizon" id="salas_categorias">
                            <!-- aqui se listan las salas -->
                        </div>

                        <div class="col-md-12" style="padding-top: 20px !important;">
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend" style="background-color: #ffffbf !important;">
                                        <span class="input-group-text"><i class="fa fa-search"></i></span>
                                    </div>
                                    <input type="text" name="search_mesas_productos" id="search_mesas_productos" placeholder="Buscar mesas" class="form-control" style="background-color: #ffffbf; border-bottom-right-radius: 5px; border-top-right-radius: 5px; color: black !important; font-weight: bold !important;" autocomplete="off" />
                                    <div class="invalid-feedback">Por favor escriba un nombre</div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="row-vertical-mesas" id="mesas">
                                <!-- aqui se listan las mesas -->
                            </div>

                            <div class="row row-vertical" id="productos">
                                <!-- aqui se listan los productos  -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- MODAL AGREGAR CLIENTE -->
    <div class="modal fade" id="modal_add_edit_cliente" tabindex="-1" role="dialog" aria-labelledby="agregar_cliente" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header text-white" style="background-color: #9f4659 !important;">
                    <h5 class="modal-title" id="agregar_cliente">Agregar Cliente</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"> <i class="fas fa-times text-white"></i> </span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" id="formulario_add_edit_cliente" name="formulario_add_edit_cliente" onsubmit="return validacion_form()">
                        <div class="row">
                            <!-- SELECT TIPO DOCUMENTO -->
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-3 col-xl-4">
                                <div class="form-group">
                                    <label for="tipo_doc">Tipo de documento</label>
                                    <select class="form-control" id="tipo_doc" name="tipo_doc">
                                        <option selected disabled hidden value="select_tipo_doc"> Selecionar</option>
                                        <option value="0">OTRO</option>
                                        <option value="1">DNI</option>
                                        <option value="2">RUC</option>
                                    </select>
                                    <div class="invalid-feedback">Selecione un tipo de documento.</div>
                                </div>
                            </div>
                            <!-- INPUT DNI/RUC -->
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-4">
                                <div class="form-group">
                                    <label for="dni_ruc">DNI/RUC</label>
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fas fa-id-card-alt"></i></div>
                                        </div>
                                        <input type="number" class="form-control" name="dni_ruc" id="dni_ruc" placeholder="DNI/RUC" />
                                        <div class="input-group-prepend" style="cursor: pointer;" onclick="buscar_sunat_reniec();" data-toggle="tooltip" title="Tooltip on top">
                                            <div class="input-group-text">
                                                <i class="fas fa-search" id="search"></i>
                                                <i class="fas fa-spinner fa-spin" id="charge" style="display: none;"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- INPUT TIPO DE CLIENTE -->
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-3 col-xl-4">
                                <div class="form-group">
                                    <label for="tipo_cliente">Tipo de cliente</label>
                                    <select class="form-control" name="tipo_cliente" id="tipo_cliente">
                                        <option selected disabled hidden value="select_tipo_cliente"> Selecionar </option>
                                        <option>NATURAL</option>
                                        <option>JURIDICO</option>
                                    </select>
                                </div>
                            </div>
                            <!-- INPUT NOMBRE -->
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                <div class="form-group">
                                    <label for="nombre"> <sup class="text-danger font-weight-bold">*</sup> Nombre/Razon-Social </label>
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fas fa-user-tie"></i></div>
                                        </div>
                                        <input type="text" class="form-control" name="nombre_razon_social" id="nombre_razon_social" placeholder="Escriba el nombre o razón social" autocomplete="off" />
                                        <div class="invalid-feedback">Escriba un nombre o razon social.</div>
                                    </div>

                                </div>
                            </div>
                            <!-- INPUT APELLIDOS -->
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                <div class="form-group">
                                    <label for="apellidos"> <sup class="text-danger font-weight-bold">*</sup> Apellidos/Nombre-Comercial </label>
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fas fa-user-tie"></i></div>
                                        </div>
                                        <input type="text" class="form-control" name="apellidos_nombre_comercial" id="apellidos_nombre_comercial" placeholder="Escriba el apellido o nombre comercial" autocomplete="off" />
                                        <div class="invalid-feedback">Escriba un apellido o razon social.</div>
                                    </div>
                                </div>
                            </div>
                            <!-- INPUT DIRECCION -->
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-8">
                                <div class="form-group">
                                    <label for="direccion">Dirección</label>
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fas fa-map-marker-alt"></i></div>
                                        </div>
                                        <input type="text" class="form-control" name="direccion" id="direccion" placeholder="Escriba la dirección" />
                                    </div>
                                </div>
                            </div>
                            <!-- INPUT LIMITE DE CREDITO -->
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-4">
                                <div class="form-group">
                                    <label for="limt_credito">Límite de crédito</label>
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fas fa-money-bill-wave"></i></div>
                                        </div>
                                        <input type="text" class="form-control" name="limit_credito" id="limit_credito" placeholder="Escriba el límite" />
                                    </div>
                                </div>
                            </div>
                            <!-- INPUT CORREO -->
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-8">
                                <div class="form-group">
                                    <label for="correo">Correo</label>
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fas fa-at"></i></div>
                                        </div>
                                        <input type="email" class="form-control" name="correo" id="correo" placeholder="Escriba el correo" />
                                    </div>
                                </div>
                            </div>
                            <!-- INPUT CELULAR -->
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-4">
                                <div class="form-group">
                                    <label for="celular">N° de celular</label>
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fas fa-mobile-alt"></i></div>
                                        </div>
                                        <input type="number" class="form-control" name="celular" id="celular" min="1" placeholder="Escriba el N° de celular" />
                                    </div>
                                </div>
                            </div>
                            <!-- :::::::: BARRA DE PROGRESO ::::::::-->
                            <div class="col-sm-12 col-md-12 col-xl-12">
                                <div class="progress" id="div_barra_progress">
                                    <div id="barra_progress" class="progress-bar" role="progressbar" aria-valuenow="2" aria-valuemin="0" aria-valuemax="100" style="min-width: 2em; width: 0%;">
                                        0%
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" style="display: none;"></button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" id="guardar_registro" class="btn btn-danger" style="background-color: #9f4659 !important;">GUARDAR</button>
                </div>
            </div>
        </div>
    </div>

    <?php require '../vistas/footer.php'; ?>

    <script src="delivery.js"></script>

    <script src="funciones/funciones.js"></script>

    <script src="../public/buscador/jquery-ui.min.js" type="text/javascript"></script>
</body>

</html>