<?php
	function agregarPack($nombre, $precio, $descripcion){
		require_once('conexion.php');
		$conexion=new Conexion();
		$conexion->conectarBD();
		$query=$conexion -> getConexion() -> prepare("INSERT INTO pack (nombre, habilitado) values (?, ?)");
		$query->execute(array($nombre, 1));
		$conexion->desconectarBD();
		$ok=true;
		return $ok;
	}

	function modificarPack($nombre, $precio, $descripcion, $id){
		require_once('conexion.php');
		$conexion=new Conexion();
		$conexion->conectarBD();
		$query=$conexion -> getConexion() -> prepare("UPDATE pack SET nombre=?, precio, descripcion WHERE id=?");
		$query->execute(array($nombre, $precio, $descripcion, $id));
		$conexion->desconectarBD();
		$ok=true;
		return $ok;
	}

	function bajaPack($id){
		require_once('conexion.php');
		$conexion=new Conexion();
		$conexion->conectarBD();
		$query=$conexion -> getConexion() -> prepare("UPDATE pack SET habilitado=? WHERE id=?");
		$query->execute(array(0, $id));
		$conexion->desconectarBD();
		$ok=true;
		return $ok;
	}

	function listaPacks(){
		require_once('conexion.php');
		$conexion=new Conexion();
		$conexion->conectarBD();
		$query=$conexion -> getConexion() -> prepare("SELECT id, nombre, precio, descripcion FROM pack WHERE habilitado=1");
		$query->execute(array());
		$conexion->desconectarBD();
		return ($query -> fetchAll(PDO::FETCH_ASSOC));
	}
?>