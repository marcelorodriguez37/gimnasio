<?php
	function agregarAsistencia($idCliente, $fechaYHora){
		require_once('conexion.php');
		$conexion=new Conexion();
		$conexion->conectarBD();
		$query=$conexion -> getConexion() -> prepare("INSERT INTO asistencia (idCliente, fecha, habilitado) values (?, ?, ?)");
		$query->execute(array($idCliente, $fechaYHora, 1));
		$conexion->desconectarBD();
		$ok=true;
		return $ok;
	}
	
	function bajaAsistencia($idCliente){
		require_once('conexion.php');
		$conexion=new Conexion();
		$conexion->conectarBD();
		$query=$conexion -> getConexion() -> prepare("UPDATE asistencia SET (habilitado=?) where id=?");
		$query->execute(array(0, $idCliente));
		$conexion->desconectarBD();
		$ok=true;
		return $ok;
	}
?>