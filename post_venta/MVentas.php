<?php
require '../Config/conexion.php';

Class MVentas{

	public function __construct(){

	}

	public function listar_salas(){
		$sql=" SELECT * FROM sala WHERE estado='0' ORDER BY id_sala ASC ";
		return ejecutarConsulta($sql);
	}

	public function listar_categorias(){
		$sql="SELECT * FROM categoria WHERE estado='0' ORDER BY id_categoria ASC ";
		return ejecutarConsulta($sql);
	}

	public function listar_producto($id_categoria){
		$sql="SELECT * FROM producto WHERE id_categoria='$id_categoria' AND estado='0' ORDER BY id_producto DESC";
		return ejecutarConsulta($sql);
	}
	
	public function listar_producto_all(){
		$sql=" SELECT * FROM producto WHERE estado='0' ORDER BY id_producto DESC";
		return ejecutarConsulta($sql);
	}

	public function listar_mesas($id_sala){
		$sql="SELECT M.nombre,M.id_mesa,s.nombre AS sala 
		FROM mesa AS m INNER JOIN sala AS s ON M.id_sala=s.id_sala 
		WHERE s.id_sala='$id_sala'  ORDER BY id_mesa ASC";
		return ejecutarConsulta($sql);
	}

}
?>
