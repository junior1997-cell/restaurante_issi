<?php

/*Aqui se crea, se edita, se eimina y se lista las categorias*/
require_once 'MVentas.php';

$MVentas = new MVentas();

$op = $_GET["op"];

switch ($op) {

    case 'listar_salas':
        $rspta = $MVentas->listar_salas();
        $data = array();
       // $id= 0;

        while ($reg = pg_fetch_object($rspta)) {
            //$id++;
            $data[] = array(
                "id_sala" => $reg->id_sala,
                "nombre" => $reg->nombre,
                "stdo_list_default" => $reg->stdo_list_default
            );
        }
        echo json_encode($data);

    break;

    case 'listar_categorias':
        $rspta = $MVentas->listar_categorias();
        $data = array();
       // $id= 0;

        while ($reg = pg_fetch_object($rspta)) {
            //$id++;
            $data[] = array(
                "id_categoria" => $reg->id_categoria,
                "nombre" => $reg->nombre
            );
        }
        echo json_encode($data);

    break;

    case 'listar_producto':
        $id_categoria = $_POST["id_categoria"];
        if ($id_categoria =='0') {
            $rspta = $MVentas->listar_producto_all();
        } else {
            $rspta = $MVentas->listar_producto($id_categoria);
        }

        $data = array();
       // $id = 0;

        while ($reg = pg_fetch_object($rspta)) {
           // $id++;
            $data[] = array(
                "id_producto" => $reg->id_producto,
                "nombre" => $reg->nombre,
                "precio_soles" => $reg->precio_soles,
                "precio_dolar" => $reg->precio_dolar,
                "id_categoria" => $reg->id_categoria
            );
        }

        echo json_encode($data);

    break;

    case 'listar_mesas':
        $id_sala = $_POST["id_sala"];

        $rspta = $MVentas->listar_mesas($id_sala);
        $data = array();
       // $id = 0;

        while ($reg = pg_fetch_object($rspta)) {
           // $id++;
            $data[] = array(
                "id_sala" => $reg->id_mesa,
                "nombre" => $reg->nombre,
                "sala" => $reg->sala,
            );
        }

        echo json_encode($data);

    break;
}
