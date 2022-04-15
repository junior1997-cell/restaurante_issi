<?php
    require '../Config/conexion.php';

    Class MDelivery{

        public function __construct(){

        }

        public function listar_salas(){
            $sql="SELECT * FROM sala ORDER BY id_sala";
            return ejecutarConsulta($sql);
        }

        public function listar_mesas($id_sala){
            $sql="SELECT * FROM mesa WHERE id_sala ='$id_sala' ORDER BY id_mesa";
            return ejecutarConsulta($sql);
        }

        public function listar_categorias(){
            $sql="SELECT * FROM categoria WHERE estado='0' ORDER BY id_categoria ASC ";
            return ejecutarConsulta($sql);
        }
    
        public function listar_producto($id_categoria){
            $sql="SELECT p.nombre as nombre_producto, p.precio_soles, 
            p.precio_dolar, p.id_categoria, p.stock,
            p.img,
            c.nombre as nombre_categoria
            FROM producto p, categoria c  
            WHERE p.id_categoria='$id_categoria' AND p.id_categoria = c.id_categoria AND p.estado='0' ORDER BY p.id_producto DESC";
            return ejecutarConsulta($sql);
        }
        
        public function listar_producto_all(){
            $sql="SELECT id_producto, p.nombre as nombre_producto, p.precio_soles, 
                        p.precio_dolar, p.id_categoria, 
                        p.stock, p.img,
                        c.nombre as nombre_categoria
                FROM producto p, categoria c 
                WHERE p.estado='0' AND p.id_categoria = c.id_categoria ORDER BY p.id_producto DESC";
            return ejecutarConsulta($sql);
        }

        public function search_cliente( $search_cliente )
        {
            $sql = "SELECT  * FROM usuario WHERE nombre_razon_social LIKE '%$search_cliente%' OR dni_ruc LIKE '%$search_cliente%'";
            return ejecutarConsulta($sql);
        }
        public function agregar_cliente($nombre_razon_social, $apellidos_nombre_comercial,$direccion, $dni_ruc, $sexo){
            $sql="INSERT INTO usuario (nombre_razon_social, apellidos_nombre_comercial, direccion, dni_ruc, sexo) 
                VALUES ('$nombre_razon_social','$apellidos_nombre_comercial','$direccion','$dni_ruc','$sexo')";
            return ejecutarConsulta($sql);
        }
        // ------------------------------------------------------------------------------

        public function insertar($titulo,$foto){
            $sql="INSERT INTO carousel (titulo,foto,estado) VALUES ('$titulo','$foto','0')";
            return ejecutarConsulta($sql);
        }

        public function editar($idcarousel,$titulo,$foto){
            $sql="UPDATE carousel SET titulo='$titulo',foto='$foto' WHERE idcarousel='$idcarousel'";
            return ejecutarConsulta($sql);
        }

        public function mostrar($id_pedido){
            $sql="SELECT * FROM categoria WHERE id_categoria ='$id_pedido'";
            return ejecutarConsultaSimpleFila($sql);
        }

        

        public function eliminar($idcarousel){
            $sql = "DELETE FROM carousel WHERE idcarousel = '$idcarousel'";
            return ejecutarConsulta($sql);
        }

        public function desactivar($idcarousel){
            $sql = "UPDATE carousel SET estado='1' WHERE idcarousel = '$idcarousel'";
            return ejecutarConsulta($sql);
        }

        public function activar($idcarousel){
            $sql = "UPDATE carousel SET estado='0' WHERE idcarousel = '$idcarousel'";
            return ejecutarConsulta($sql);
        }

        //CAPTURAR PERSONA  DE RENIEC REQUJO SALVACION
        public function datos_reniec($dni)
        { 
            $url = "https://dniruc.apisperu.com/api/v1/dni/".$dni."?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJlbWFpbCI6Imp1bmlvcmNlcmNhZG9AdXBldS5lZHUucGUifQ.bzpY1fZ7YvpHU5T83b9PoDxHPaoDYxPuuqMqvCwYqsM";
            //  Iniciamos curl
            $curl = curl_init();
            // Desactivamos verificación SSL
            curl_setopt( $curl, CURLOPT_SSL_VERIFYPEER, 0 );
            // Devuelve respuesta aunque sea falsa
            curl_setopt( $curl, CURLOPT_RETURNTRANSFER, 1 );
            // Especificamo los MIME-Type que son aceptables para la respuesta.
            curl_setopt( $curl, CURLOPT_HTTPHEADER, [ 'Accept: application/json' ] );
            // Establecemos la URL
            curl_setopt( $curl, CURLOPT_URL, $url );
            // Ejecutmos curl
            $json = curl_exec( $curl );
            // Cerramos curl
            curl_close( $curl );
      
            $respuestas = json_decode( $json, true );
      
            return $respuestas;
        }

        //CAPTURAR PERSONA  DE RENIEC REQUJO SALVACION
        public function datos_sunat($ruc)
        { 
            $url = "https://dniruc.apisperu.com/api/v1/ruc/".$ruc."?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJlbWFpbCI6Imp1bmlvcmNlcmNhZG9AdXBldS5lZHUucGUifQ.bzpY1fZ7YvpHU5T83b9PoDxHPaoDYxPuuqMqvCwYqsM";
            //  Iniciamos curl
            $curl = curl_init();
            // Desactivamos verificación SSL
            curl_setopt( $curl, CURLOPT_SSL_VERIFYPEER, 0 );
            // Devuelve respuesta aunque sea falsa
            curl_setopt( $curl, CURLOPT_RETURNTRANSFER, 1 );
            // Especificamo los MIME-Type que son aceptables para la respuesta.
            curl_setopt( $curl, CURLOPT_HTTPHEADER, [ 'Accept: application/json' ] );
            // Establecemos la URL
            curl_setopt( $curl, CURLOPT_URL, $url );
            // Ejecutmos curl
            $json = curl_exec( $curl );
            // Cerramos curl
            curl_close( $curl );
      
            $respuestas = json_decode( $json, true );
      
            return $respuestas;    	
            
        }
    }
