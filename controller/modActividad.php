<?php
	session_start();
	require_once('./configTwig.php');
	if (!empty($_POST["nombre"]) and !empty($_POST["id"])){
		
		require_once('../model/ABMActividad.php');
		$nombre=$_POST["nombre"];

		if(!existeActividadAlmodificar($nombre,$_POST["id"])){
			$datos['MODIFICARcorrecto']=modificarActividad($nombre,$_POST["id"]);
			$datos['listaDeActividades'] = listaActividades();
			renderizar2('listadoActividades.html', $datos);
			
		}else{
			$datos['existeActividad']=true;
			$datos["actividad"]=buscarActividad($_POST['id']);
			renderizar2('modificarActividad.html',$datos);
		}
	} 
	else
	{		
		renderizar2('altaActividad.html',array());
	}
?>