<?php

    if (strlen(session_id()) < 1) {  session_start();  }

    require_once 'MDelivery.php';

    $delivery = new MDelivery();

    $nombre_razon_social = isset($_POST["nombre_razon_social"]) ? limpiarCadena(strtoupper($_POST["nombre_razon_social"])) : "";

    $apellidos_nombre_comercial = isset($_POST["apellidos_nombre_comercial"]) ? limpiarCadena(strtoupper($_POST["apellidos_nombre_comercial"])) : "";

    $direccion = isset($_POST["direccion"]) ? limpiarCadena( strtoupper( $_POST["direccion"] ) ) : "";

    $dni_ruc = isset($_POST["dni_ruc"]) ? limpiarCadena( $_POST["dni_ruc"]) : "";

    $sexo = isset($_POST["sexo"]) ? limpiarCadena( strtoupper($_POST["sexo"])) : "";

    $op = $_GET["op"];

    switch ($op) {

        case 'listar_salas':

            $rspta = $delivery->listar_salas();

            $data = [];

            while ($reg = pg_fetch_object($rspta)) {
                $data[] = [
                    "id_sala" => $reg->id_sala,
                    "nombre" => $reg->nombre,
                    "estado" => $reg->estado,
                    "created_at" => $reg->created_at,
                    "stdo_list_default" => $reg->stdo_list_default,
                ];
            }

            echo json_encode($data);

        break;

        case 'listar_mesas':

            $id_sala = $_POST["id_sala"];

            $rspta = $delivery->listar_mesas($id_sala);

            $data = [];

            while ($reg = pg_fetch_object($rspta)) {
                $data[] = [
                    "id_mesa" => $reg->id_mesa,
                    "nombre" => $reg->nombre,
                    "id_sala" => $reg->id_sala,
                    "estado" => $reg->estado,
                    "created_at" => $reg->created_at,
                ];
            }

            echo json_encode($data);

        break;

        case 'listar_categorias':

            $rspta = $delivery->listar_categorias();

            $data = [];

            while ($reg = pg_fetch_object($rspta)) {

                $data[] = [
                    "id_categoria" => $reg->id_categoria,
                    "nombre" => $reg->nombre,
                ];
            }

            echo json_encode($data);
        break;

        case 'listar_producto':

            $id_categoria = $_POST["id_categoria"];

            if ($id_categoria == '0') {
                $rspta = $delivery->listar_producto_all();
            } else {
                $rspta = $delivery->listar_producto($id_categoria);
            }

            $data = [];

            while ($reg = pg_fetch_object($rspta)) {
                
                $data[] = [
                    "id_producto"       => $reg->id_producto,
                    "nombre_producto"   => $reg->nombre_producto,
                    "precio_soles"      => $reg->precio_soles,
                    "precio_dolar"      => $reg->precio_dolar,
                    "stock"             => $reg->stock,
                    "img"               => $reg->img,
                    "id_categoria"      => $reg->id_categoria,
                    "nombre_categoria"  => $reg->nombre_categoria,
                ];
            }

            echo json_encode($data);
        break;
        
        case 'reniec':
             
            $dni = $_POST["dni"];

            $rspta=$delivery->datos_reniec($dni);
             
            echo json_encode($rspta);

        break;

        case 'sunat':

            $ruc = $_POST["ruc"];

            $rspta=$delivery->datos_sunat($ruc);
             
            echo json_encode($rspta);	
                
        break;

        case 'buscar_cliente':

            $search_cliente = $_POST["search_cliente"];

            $response       = [];

            $rspta          = $delivery->search_cliente($search_cliente); 

            while ($row = pg_fetch_object($rspta)) {

                $response[] = [
                    "value" => $row->id_usuario, 
                    "label" => $row->dni_ruc.' - '.$row->nombre_razon_social.' '.$row->apellidos_nombre_comercial
                ];
            }

            echo json_encode($response);	
                
        break;

        case 'agregar_cliente':

            $rspta = $delivery->agregar_cliente($nombre_razon_social, $apellidos_nombre_comercial,$direccion, $dni_ruc, $sexo); 

            echo $rspta ;
                
        break;
        // case 'mostrar':
        //   $id_pedido = $_GET["id"];
        //   $rspta = $delivery->mostrar($id_pedido);

        //   echo json_encode($rspta);
        // break;

        // case 'guardaryeditar':

        //   if (empty($idgaleria)){

        //     $rspta=$delivery->insertar($titulo,$descripcion,$foto);

        //     echo $rspta;
        //   }else {

        //       $rspta=$delivery->editar($idgaleria,$titulo,$descripcion,$foto);

        //       echo $rspta;
        //   }
        //   break;

        // case 'desactivar':

        //   $rspta=$delivery->desactivar($idgaleria);

        //   echo $rspta;
        // break;

        // case 'activar':

        //   $rspta=$delivery->activar($idgaleria);

        //   echo $rspta;
        // break;

        default:
            echo 'ERROR AJAX CATEGORIA SIN OP';
        break;
    }
