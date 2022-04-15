<?php
require '../vistas/header.php';
?>
<link rel="stylesheet" href="../public/css/styles.css">

<body>
    <div style="padding: 11px 30px;">
        <div class="row">
            <div class="col-lg-3 col-md-4 col-xs-12 align-self-center">
                <h5 class="font-medium text-uppercase mb-0"><i class="fa fa-tasks"></i> Mostrador de Pedidos</h5>
            </div>
            <div class="col-lg-9 col-md-8 col-xs-12 align-self-center">
                <nav aria-label="breadcrumb" class="mt-2 float-md-right float-left">
                    <ol class="breadcrumb mb-0 justify-content-end p-0">
                        <li class="breadcrumb-item"><a href="#" class="text-info"> Mostrador</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><a href="#" class="text-info"> Cerrar Sesión</a></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="container-fluid contenido">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 xxl-12">
                <div class="card clasecard">
                    <div class="card-header colorcarhead">
                        <h4 class="card-title text-white stiloh4"><i class="fa fa-desktop"></i> Mostrador de Pedidos</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive" id="demo">
                            <table id="example" class="display" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>N°</th>
                                        <th>Sala/mesa</th>
                                        <th>Descripción de cliente</th>
                                        <th>Platillos</th>
                                        <th>Observaciones</th>
                                        <th>Entregar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>SALA SECUNDARIA MESA 3</td>
                                        <td>CLIENTE VARIOS</td>
                                        <td>
                                            Pedido #1
                                            <br>
                                            1.00 | PAPAS A LA FRACESA <br>
                                            1.00 | PORCION DE POLLO <br>
                                            1.00 | GASEOSA 1.5
                                        </td>
                                        <td>SIN OBSERVACIONES</td>
                                        <td>
                                            <button class="btn btn-info" style="border-radius: 90px;"><i class="fa fa-refresh" aria-hidden="true"></i></button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>SALA SECUNDARIA MESA 3</td>
                                        <td>CLIENTE VARIOS</td>
                                        <td>
                                            Pedido #1
                                            <br>
                                            1.00 | PAPAS A LA FRACESA <br>
                                            1.00 | PORCION DE POLLO <br>
                                            1.00 | GASEOSA 1.5
                                        </td>
                                        <td>SIN OBSERVACIONES</td>
                                        <td>
                                            <button class="btn btn-info" style="border-radius: 90px;"><i class="fa fa-refresh" aria-hidden="true"></i></button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>SALA SECUNDARIA MESA 3</td>
                                        <td>CLIENTE VARIOS</td>
                                        <td>
                                            Pedido #1
                                            <br>
                                            1.00 | PAPAS A LA FRACESA <br>
                                            1.00 | PORCION DE POLLO <br>
                                            1.00 | GASEOSA 1.5
                                        </td>
                                        <td>SIN OBSERVACIONES</td>
                                        <td>
                                            <button class="btn btn-info" style="border-radius: 90px;"><i class="fa fa-refresh" aria-hidden="true"></i></button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>
                                            <span class="badge rounded-pill bg-success" style="background-color: #2cd07e!important;">
                                                <i class="fa fa-check" aria-hidden="true"></i> DELIVERY
                                            </span>
                                        </td>
                                        <td>
                                            <span class="badge rounded-pill bg-warning text-dark" style="background-color: #ffc36d!important;">
                                                <i class="fa fa-times" aria-hidden="true"></i> SIN ASIGNAR
                                            </span>
                                        </td>
                                        <td>
                                            Pedido #1
                                            <br>
                                            1.00 | PAPAS A LA FRACESA <br>
                                            1.00 | PORCION DE POLLO <br>
                                            1.00 | GASEOSA 1.5
                                        </td>
                                        <td>SIN OBSERVACIONES</td>
                                        <td>
                                            <button class="btn btn-info" style="border-radius: 90px;"><i class="fa fa-refresh" aria-hidden="true"></i></button>
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
</body>

<?php
require '../vistas/footer.php';
?>
<script src="cosinero.js"></script>