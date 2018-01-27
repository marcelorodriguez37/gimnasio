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
		$query = $conexion -> getConexion() -> prepare("SELECT c.nombre, c.apellido, c.dni , a.fecha FROM asistencia a INNER JOIN CLIENTE C ON(c.id = a.idCliente) WHERE a.habilitado = 1");
		$query->execute(array());
		$res = $query -> fetchAll(PDO::FETCH_ASSOC);
		$conexion->desconectarBD();
		return $res;
	}

	function asistenciaPorRango($idCliente, $fechaDesde, $fechaHasta){
		require_once('conexion.php');
		$conexion = new Conexion();
		$conexion->conectarBD();
		$query = $conexion -> getConexion() -> prepare("SELECT a.fecha FROM asistencia a WHERE a.habilitado = ? and a.idCliente=? and a.fecha between ? and ?");
		$query->execute(array(1, $idCliente, $fechaDesde, $fechaHasta));
		$res = $query -> fetchAll(PDO::FETCH_ASSOC);
		$conexion->desconectarBD();
		return $res;
	}


?>