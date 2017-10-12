<?php
function listaDeUsuario(){
		require_once('conexion.php');
		$conexion= new Conexion();
		$conexion->conectarBD();
		$query= $conexion -> getConexion()-> prepare( "SELECT id, nombre, apellido, dni FROM cliente WHERE habilitado='si'");
		$query-> execute(array());
		$conexion->desconectarBD();
		return ($query -> fetchAll(PDO::FETCH_ASSOC));
	}
?>