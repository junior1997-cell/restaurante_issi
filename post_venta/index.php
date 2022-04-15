<?php
require '../vistas/header.php';
?>

<body>
    <div style="padding: 11px 30px;">

        <h5 class="font-medium text-uppercase mb-0"><i class="fa fa-tasks"></i> Gestión de Ventas</h5>

    </div>
    <div class="container-fluid contenido">

        <div class="row">
            <div class="col-12  col-sm-12  col-md-12  col-lg-5  col-xl-5 col-xxl-5 cardpequeño">
                <div class="card clasecard">
                    <div class="card-header colorcarhead">
                        <h4 class="card-title text-white stiloh4"><i class="fas fa-pencil-alt"></i> Gestión de Ventas</h4>
                    </div>
                    <div class="card-body" style=" padding-top: 5px !important;">
                        <div id="muestradetallemesa">
                            <center>SELECCIONE MESA PARA CONTINUAR -&gt;</center>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12  col-sm-12  col-md-12  col-lg-7  col-xl-7 col-xxl-7 cardgrande">

                <div class="card clasecard" id="card_mesas">
                    <div class="card-header colorcarhead">
                        <h4 class="card-title text-white stiloh4" id="titulo_card"><i class="fa fa-tasks"></i> Mesas/Productos</h4>
                    </div>
                    <div class="card-body">
                        <div class="row-horizon" id="salas_categorias">

                        </div>
                        <br>
                        <div>
                            <div class="row-vertical-mesas" id="mesas_productos">                    
                            </div>
                            
                            <div class="row row-vertical" id="productos">
                            </div>
                        </div>
                    </div>
                </div>

                <!--<div class="card clasecard" id="card_producto">
                    <div class="card-header colorcarhead">
                        <h4 class="card-title text-white stiloh4"><i class="fa fa-tasks"></i> Mesas/Productos</h4>
                    </div>
                    <div class="card-body">
                        <div class="row-horizon">
                            <span class="categories" id="SALA PRINCIPAL"><i class="fa fa-home"></i></span>
                            <span class="categories" id="SALA SECUNDARIA">SALA SECUNDARIA</span>
                            <span class="categories" id="SALA BALCONES">SALA BALCONES</span>
                            <span class="categories" id="SALA BALCONES">SALA BALCONES</span>
                            <span class="categories" id="SALA BALCONES">SALA BALCONES</span>
                            <span class="categories" id="SALA BALCONES">SALA BALCONES</span>
                        </div>
                        <div class="col-md-12">
                            <div id="buscador">
                                <div id="searchContaner">
                                    <label class="control-label"></label>
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend" style="background-color: #FFFFBF!important;">
                                                    <span class="input-group-text"><i class="fa fa-search"></i></i></span>
                                                </div>
                                                <input type="text" class="form-control" style=" background-color: #FFFFBF;border-bottom-right-radius: 5px;border-top-right-radius: 5px;" name="busquedaproductov" id="busquedaproductov" placeholder="Realice la Búsqueda del Producto por Nombre" style="color: black !important; font-weight: bold !important;" autocomplete="off" />
                                                <div class="invalid-feedback">Por favor escriba un nombre</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="productList2">
                                <div class="row row-vertical">

                                    <div>

                                            <div class="darkblue-panel pn" title="LOMITO DE RES | (ASADOS)">
                                                <div class="darkblue-header">
                                                    <div id="proname" class="text-white">LOMITO DE RES</div>
                                                </div>
                                                <img src=" ../public/images/producto.png" class="rounded-circle" style="width:150px;height:134px;"> <input type="hidden" id="category" name="category" value="ASADOS">
                                                <div class="mask">
                                                    <a class="text-white">
                                                        <strong>S/</strong>32.00<br>
                                                        $9.41 </a>
                                                    <h5><i class="fa fa-bars"></i> 110.00</h5>
                                                </div>

                                            </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="tbllistado_carousel">
                        </div>
                    </div>
                </div>-->
            </div>
            <div id="productos">

            </div>
        </div>
    </div>
    <?php
    require '../vistas/footer.php';
    ?>
    <script src="venta.js"> </script>
</body>