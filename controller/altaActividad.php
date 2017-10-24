<?php
	session_start();
	require_once('./configTwig.php');
	if (!empty($_POST["nombre"])){
		
		require_once('../model/ABMActividad.php');
		$nombre=$_POST["nombre"];

		if(!existeActividad($nombre)){
			$datos['correcto']=agregarActividad($nombre);
			$datos['listaDeActividades'] = listaActividades();
			renderizar2('listadoActividades.html', $datos);
			
		}else{
			$datos['existeActividad']=true;
			renderizar2('altaActividad.html',$datos);
		}
	}
	else
	{		
		renderizar2('altaActividad.html',array());
	}
?>