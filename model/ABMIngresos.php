<?php
	function ingresoPorRango($fechaDesde, $fechaHasta){
		require_once('conexion.php');
		$conexion = new Conexion();
		$conexion->conectarBD();
		$query = $conexion -> getConexion() -> prepare("SELECT SUM(monto) AS total FROM abono WHERE fecha BETWEEN ? AND ?");
		$query->execute(array($fechaDesde, $fechaHasta));
		$conexion->desconectarBD();
		return $query -> fetchObject();
	}

	function listaIngresosPorRango($fechaDesde, $fechaHasta){
		require_once('conexion.php');
		$conexion = new Conexion();
		$conexion->conectarBD();
		$query = $conexion -> getConexion() -> prepare("SELECT p.nombre as pack, c.dni as cliente, a.fecha, a.monto FROM abono a INNER JOIN pack p ON(p.id = a.idPack) INNER JOIN cliente c ON(c.id = a.idCliente) WHERE fecha BETWEEN ? AND ?");
		$query->execute(array($fechaDesde, $fechaHasta));
		$res = $query -> fetchAll(PDO::FETCH_ASSOC);
		$conexion->desconectarBD();
		return $res;
	}
?>