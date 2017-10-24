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

	function listaDeAsistencia() {
	require_once('conexion.php');
	$conexion = new Conexion();
	$conexion->conectarBD();
	$query = $conexion -> getConexion() -> prepare("SELECT a.idCliente, a.fecha FROM asistencia a WHERE a.habilitado = 1");
	$query->execute(array());
	$res = $query -> fetchAll(PDO::FETCH_ASSOC);
	$conexion->desconectarBD();
	return $res;
}

	function existe($dni){
		require_once('conexion.php');
		$conexion = new Conexion();
		$conexion->conectarBD();
		$query = $conexion -> getConexion() -> prepare("SELECT * FROM cliente WHERE dni = ?");
		$query->execute(array($dni));
		$conexion->desconectarBD();
		return $query -> fetchObject();
	}

?>