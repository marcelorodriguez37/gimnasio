<?php
	function agregarPack($nombre,$arregloActividad,$precio,$descripcion){

		require_once('conexion.php');
		$conexion=new Conexion();
		$conexion->conectarBD();
		$query=$conexion -> getConexion() -> prepare("INSERT INTO pack (nombre, precio,descripcion, habilitado) values (?,?,?,?)"); 
		$query->execute(array($nombre,$precio,$descripcion,1));


		$query=$conexion -> getConexion() -> prepare("SELECT pack.id FROM pack ORDER BY pack.id DESC LIMIT 1"); 
		$query->execute(array());
		$id_pack =  ($query-> fetchAll(PDO::FETCH_ASSOC)[0]['id']);
		
		for ($i=0; $i<sizeof($arregloActividad) ; $i++) { 
			$id_actividad = (int)($arregloActividad[$i]);
			
			$query=$conexion -> getConexion() -> prepare("INSERT INTO pack_actividad (id_pack, id_actividad) values (?, ?)");
			$query->execute(array($id_pack,$id_actividad));
		}
		

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
	function existePack($nombre){
		require_once('conexion.php');
		$conexion=new Conexion();
		$conexion->conectarBD();
		$query=$conexion -> getConexion() -> prepare("SELECT id FROM pack WHERE nombre=? and habilitado=1");
		$query->execute(array($nombre));
		$conexion->desconectarBD();
		return(!empty(($query -> fetchAll(PDO::FETCH_ASSOC))));
		
	}
	function buscarPack($id){
		require_once('conexion.php');
		$conexion = new Conexion();
		$conexion->conectarBD();
		$query = $conexion -> getConexion() -> prepare("SELECT * FROM pack WHERE id = ?");
		$query->execute(array($id));
		$conexion->desconectarBD();
		return ($query -> fetchAll(PDO::FETCH_ASSOC));
	}
	function buscarActividadesDelPack($id){
		require_once('conexion.php');
		$conexion = new Conexion();
		$conexion->conectarBD();
		$query = $conexion -> getConexion() -> prepare("SELECT id_actividad FROM pack_actividad WHERE id_pack = ?");
		$query->execute(array($id));
		$conexion->desconectarBD();
		return ($query -> fetchAll(PDO::FETCH_ASSOC));
	}

	function montoPack($id){
		require_once('conexion.php');
		$conexion = new Conexion();
		$conexion->conectarBD();
		$query = $conexion -> getConexion() -> prepare("SELECT precio FROM pack WHERE id = ?");
		$query->execute(array($id));
		$conexion->desconectarBD();
		return ($query -> fetchAll(PDO::FETCH_ASSOC));
	}
?>