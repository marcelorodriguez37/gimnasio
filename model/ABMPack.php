<?php
	function agregarPack($nombre, $arregloActividad){
		require_once('conexion.php');
		$conexion=new Conexion();
		$conexion->conectarBD();
		$query=$conexion -> getConexion() -> prepare("INSERT INTO pack (nombre, habilitado) values (?, ?)"); 
		$query->execute(array($nombre, 1));

		for ($i=0; $i<sizeof($arregloActividad) ; $i++) { 
			$id_actividad = (int)($arregloActividad[$i]);
			$query=$conexion -> getConexion() -> prepare("INSERT INTO pack_actividad (id_pack, id_actividad) values (?, ?)");
			$query->execute(array(15,$id_actividad));
		}
		

		$conexion->desconectarBD();
		$ok=true;
		return $ok;

		/*try { 
	    $dbh = new PDO('mysql:host=localhost;dbname=gimnasio', 'root', ''); 

	    $stmt = $dbh->prepare("INSERT INTO pack (nombre, precio, descripcion, habilitado) VALUES(?,?,?,?)"); 

	    try { 
	        $dbh->beginTransaction(); 
	        $stmt->execute( array('user',17, 'dasdasdsa', 1)); 
	        $dbh->commit(); 
	        var_dump($dbh->lastInsertId()); 
	    } catch(PDOExecption $e) { 
	        $dbh->rollback(); 
	        print "Error!: " . $e->getMessage() . "</br>"; 
	    } 
		} catch( PDOExecption $e ) { 
		    print "Error!: " . $e->getMessage() . "</br>"; 
		} 
		die();*/
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
?>