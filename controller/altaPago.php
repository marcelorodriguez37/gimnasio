<?php
	session_start();
	require_once('./configTwig.php');
	if (!empty($_POST["actividad"]) and !empty($_POST["dni"]) and 
		!empty($_POST["monto"]))
	{
		
		require_once('../model/ABMAbono.php');
		require_once('../model/ABMCliente.php');

		$nombrePack=$_POST["actividad"];
		$dniCliente=$_POST["dni"];
		$cliente=existe($dniCliente);
		$monto=$_POST["monto"];
		$pack=buscarActividad($nombrePack);

	    if($cliente == null){
			$datos["existe"]='no existe';
			renderizar2('altaPago.html', $datos);	
		}else{
			$datos["existe"]='existe';

			//date_default_timezone_set('Buenos_Aires');
			$fecha = date('Y-m-d');
			agregarAbono($pack->id,$cliente->id, $fecha,$monto);
			renderizar2('altaPago.html', $datos);
		}
	}
	else
	{
		renderizar2('altaPago.html',array());	
	}	
	
?>