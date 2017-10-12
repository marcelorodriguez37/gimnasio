<?php
Class Conexion {

	public $conexion;

	function conectarBD() {
		//conection:
		$db_host="localhost";
		$db_user="grupo18";
		$db_pass="Ko2aeKeixi";
		$db_base="grupo18"; 

		try {
			$this->conexion = new PDO("mysql:dbname=$db_base;host=$db_host",$db_user,$db_pass);
			}
		catch(PDOException $e){
			echo "ERROR". $e->getMessage();
			}
	}

	function desconectarBD() {
		$this->conexion = null;
	}


	function getConexion(){
		return $this -> conexion;
	}
}
?>