<?php $conn = "host=localhost port=5432 dbname=etrisa_sistema_restaurante user=etrisa password=s*uJ9^%Oi#Ob options='--client_encoding=UTF8'";
$conexion = pg_connect($conn);

if(!$conexion) {
  echo "Error: No se ha podido conectar a la base de datos\n";
  exit();
}


if (!function_exists('ejecutarConsulta')){

  function ejecutarConsulta($sql){
    global $conexion;
    $query = pg_query($conexion, $sql);
    return $query;
  }

  function ejecutarConsultaSimpleFila($sql){
    global $conexion;
    $query = pg_query($conexion, $sql);
    $row = pg_fetch_assoc($query);
    //return $row;
    $msj = "";
    if ($row) {
      $msj = $row;
    }else {
      $msj = "vacio";
    }
    return $msj;
  }


  function ejecutarConsulta_retornarID($sql){
    global $conexion;
    $query = pg_query($sql);
    $row = pg_fetch_row($query);
    $new_id = $row['0'];
    return $new_id;
  }

  //$rows = $db->query("select id from games LIMIT 1"); $row = $rows->fetch_object(); echo $row->id;
  function ejecutarConsulta_retornaUnSoloCampo($sql,$variable){
    global $conexion;
    $query = pg_query($conexion, $sql);
    $row = pg_fetch_object($query);
    $msj = "";
    if ($row) {
      $msj = $row->$variable;
    }else {
      $msj = "vacio";
    }
    return $msj;
  }

function limpiarCadena($str){
  global $conexion;
  $str = pg_escape_string($conexion,trim($str));
  return htmlspecialchars($str);
}
}