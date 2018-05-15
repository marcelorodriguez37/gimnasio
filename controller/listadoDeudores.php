<?php
	session_start();
	require_once('./configTwig.php');
	if (!empty($_POST["fDesde"]) and !empty($_POST["fHasta"])){
		require_once('../model/ABMIngresos.php');
		$fechaDesde = $_POST["fDesde"];
		$fechaHasta = $_POST["fHasta"];
		if($fechaDesde >= $fechaHasta){
			$datos["error"]='errorFecha';
			renderizar2('ingresoPorRango.html', $datos);	
		}else{
			$abono=ingresoPorRango($fechaDesde, $fechaHasta);
			$datos['montoTotal']=$abono->total;
			$datos['listaIngresos']=listaDeudoresPorRango($fechaDesde, $fechaHasta);
			renderizar2('listadoDeudores.html', $datos);	
		}
	}else{
		renderizar2('listadoDeudores.html', array());	
	}	
?>