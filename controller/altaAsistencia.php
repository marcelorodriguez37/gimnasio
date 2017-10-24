<?php
	session_start();
	require_once('./configTwig.php');
	if (!empty($_POST["DNI"]) ){
		require_once('../model/ABMAsistencia.php');
		require_once('../model/ABMCliente.php');
		$dni=$_POST["DNI"];
		$cliente=existe($dni);
		if($cliente == null){
			$datos["existe"]='no existe';
			renderizar2('altaAsistencia.html', $datos);	
		}else{
			$datos["existe"]='existe';

			//date_default_timezone_set('Buenos_Aires');
			$fecha = date('Y-m-d');
			agregarAsistencia($cliente->id, $fecha);
			renderizar2('altaAsistencia.html', $datos);
		}
	}else{
		renderizar2('altaAsistencia.html',array());	
	}	
?>