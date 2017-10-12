<?php
	function agregarCliente($nombre, $apellido, $direccion, $dni, $fechaNac, $telefono, $fechaInscripcion, $observaciones){
		require_once('conexion.php');
		$conexion=new Conexion();
		$conexion->conectarBD();
		$query=$conexion -> getConexion() -> prepare("INSERT INTO cliente (nombre, apellido, direccion, dni, fechaNac, telefono, fechaInscripcion, observaciones, habilitado) values (?, ?, ?, ?, ?, ?, ?, ?,?)");
		$query->execute(array($nombre, $apellido, $direccion, $dni, $fechaNac, $telefono, $fechaInscripcion, $observaciones,1));
		$conexion->desconectarBD();
		$ok=true;
		return $ok;
	}

	function modificarCliente($nombre, $apellido, $direccion, $dni, $fechaNac, $telefono, $fechaInscripcion, $observaciones, $id){
		require_once('conexion.php');
		$conexion=new Conexion();
		$conexion->conectarBD();
		$query=$conexion -> getConexion() -> prepare("UPDATE cliente SET nombre=?, apellido=?, direccion=?, dni=?, fechaNac=?, telefono=?, fechaInscripcion=?, observaciones=? WHERE id=?");
		$query->execute(array($nombre, $apellido, $direccion, $dni, $fechaNac, $telefono, $fechaInscripcion, $observaciones, $id));
		$conexion->desconectarBD();
		$ok=true;
		return $ok;
	}

	function bajaCliente($id){
		require_once('conexion.php');
		$conexion=new Conexion();
		$conexion->conectarBD();
		$query=$conexion -> getConexion() -> prepare("UPDATE cliente SET habilitado=? WHERE id=?");
		$query->execute(array(0, $id));
		$conexion->desconectarBD();
		$ok=true;
		return $ok;
	}

	function listaClientes(){
		require_once('conexion.php');
		$conexion=new Conexion();
		$conexion->conectarBD();
		$query=$conexion -> getConexion() -> prepare("SELECT id, nombre, apellido, dni FROM cliente WHERE habilitado=?");
		$query->execute(array(1));
		$conexion->desconectarBD();
		return ($query -> fetchAll(PDO::FETCH_ASSOC));
	}

	function buscarCliente($id){
		require_once('conexion.php');
		$conexion=new Conexion();
		$conexion->conectarBD();
		$query=$conexion -> getConexion() -> prepare("SELECT * FROM cliente WHERE id=? and habilitado=?");
		$query->execute(array($id,1));
		$conexion->desconectarBD();
		return ($query -> fetchAll(PDO::FETCH_ASSOC));	
	}
?>