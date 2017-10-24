<?php
	function agregarAbono($idPack, $idCliente, $fecha, $monto){
		require_once('conexion.php');
		$conexion=new Conexion();
		$conexion->conectarBD();
		$query=$conexion -> getConexion() -> prepare("INSERT INTO abono (idPack, idCliente, fecha, monto, habilitado) values (?, ?, ?, ?, ?)");
		$query->execute(array($idPack, $idCliente, $fecha, $monto, 1));
		$conexion->desconectarBD();
		$ok=true;
		return $ok;
	}

	function bajaAbono($id){
		require_once('conexion.php');
		$conexion=new Conexion();
		$conexion->conectarBD();
		$query=$conexion -> getConexion() -> prepare("UPDATE abono SET habilitado=? WHERE id=?");
		$query->execute(array(0, $id));
		$conexion->desconectarBD();
		$ok=true;
		return $ok;
	}

	

?>