<!DOCTYPE html>
<html lang="es">

<head>
    <?php require '../vistas/header.php'; ?>
    <link href="../public/buscador/jquery-ui.min.css" rel="stylesheet" type="text/css" />
</head>

<body>
     
    <div class="container-fluid contenido">
        <div class="text-center table-responsive m-t-10">
            <table class="table">
                <thead>
                    <tr>
                    <th>#</th>
                    <th>x1</th>
                    <th>x2</th>
                    <th>Multiplicacion</th>
                    <th>aleatorio</th>
                    </tr>
                </thead>
                <tbody id="aleatorio">                    
                     
                </tbody>
            </table>
        </div>
    </div>
    

    <?php require '../vistas/footer.php'; ?>

    <script src="js.js"></script>

    <script src="funciones/funciones.js"></script>

    <script src="../public/buscador/jquery-ui.min.js" type="text/javascript"></script>
</body>

</html>