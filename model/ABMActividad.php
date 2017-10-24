<?php
	function agregarActividad($nombre){
		require_once('conexion.php');
		$conexion=new Conexion();
		$conexion->conectarBD();
		$query=$conexion -> getConexion() -> prepare("INSERT INTO actividad (nombre, habilitado) values (?, ?)");
		$query->execute(array($nombre, 1));
		$conexion->desconectarBD();
		$ok=true;
		return $ok;
	}

	function modificarActividad($nombre, $id){
		require_once('conexion.php');
		$conexion=new Conexion();
		$conexion->conectarBD();
		$query=$conexion -> getConexion() -> prepare("UPDATE actividad SET nombre=? WHERE id=?");
		$query->execute(array($nombre, $id));
		$conexion->desconectarBD();
		$ok=true;
		return $ok;
	}

	function bajaActividad($id){
		require_once('conexion.php');
		$conexion=new Conexion();
		$conexion->conectarBD();
		$query=$conexion -> getConexion() -> prepare("UPDATE actividad SET habilitado=? WHERE id=?");
		$query->execute(array(0, $id));
		$conexion->desconectarBD();
		$ok=true;
		return $ok;
	}

	function listaActividades(){
		require_once('conexion.php');
		$conexion=new Conexion();
		$conexion->conectarBD();
		$query=$conexion -> getConexion() -> prepare("SELECT id, nombre FROM actividad WHERE habilitado=1");
		$query->execute(array());
		$conexion->desconectarBD();
		return ($query -> fetchAll(PDO::FETCH_ASSOC));
	}
	function existeActividad($nombre){
		require_once('conexion.php');
		$conexion=new Conexion();
		$conexion->conectarBD();
		$query=$conexion -> getConexion() -> prepare("SELECT id FROM actividad WHERE nombre=? and habilitado=1");
		$query->execute(array($nombre));
		$conexion->desconectarBD();
		return(!empty(($query -> fetchAll(PDO::FETCH_ASSOC))));
		
	}
	function existeActividadAlmodificar($nombre,$id){
		require_once('conexion.php');
		$conexion=new Conexion();
		$conexion->conectarBD();
		$query=$conexion -> getConexion() -> prepare("SELECT * FROM actividad WHERE nombre=? and not id=? and habilitado=1");
		$query->execute(array($nombre,$id));
		$conexion->desconectarBD();
		return(!empty(($query -> fetchAll(PDO::FETCH_ASSOC))));
		
	}
	function buscarActividad($id){
		require_once('conexion.php');
		$conexion=new Conexion();
		$conexion->conectarBD();
		$query=$conexion -> getConexion() -> prepare("SELECT * FROM actividad WHERE id=? and habilitado=?");
		$query->execute(array($id,1));
		$conexion->desconectarBD();
		return ($query -> fetchAll(PDO::FETCH_ASSOC));	
	}
?>