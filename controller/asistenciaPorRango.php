<?php
	session_start();
	require_once('./configTwig.php');
	if (!empty($_POST["dni"]) and !empty($_POST["fDesde"]) and !empty($_POST["fHasta"])  ){
		require_once('../model/ABMAsistencia.php');
		require_once('../model/ABMCliente.php');
		$dni=$_POST["dni"];
		$cliente=existe($dni);
		$fechaDesde = $_POST["fDesde"];
		$fechaHasta = $_POST["fHasta"];
		if($cliente == null){
			$datos["existe"]='no existe';
			renderizar2('asistenciaPorRango.html', $datos);	
		}elseif ($fechaDesde >= $fechaHasta) {
			$datos["error"]='errorFecha';
			renderizar2('asistenciaPorRango.html', $datos);
		}else{
			$datos['nombre']=$cliente->nombre;
			$datos['listaPorRango']=asistenciaPorRango($cliente->id, $fechaDesde, $fechaHasta);
			renderizar2('asistenciaPorRango.html', $datos);
		}
	}else{
		renderizar2('asistenciaPorRango.html',array());	
	}	
?>