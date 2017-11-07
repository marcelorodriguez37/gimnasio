<?php
	session_start();
	require_once('./configTwig.php');
	require_once('../model/ABMActividad.php');

	if ((!empty($_POST["nombre"])) and (!empty($_POST["arregloDeActividades"]))) {
		
		require_once('../model/ABMPack.php');
		$nombre=$_POST["nombre"];
		if(!existePack($nombre)){
			$arregloActividades = $_POST["arregloDeActividades"];
			$datos['correcto']=agregarPack($nombre,$arregloActividades);
			$datos['listaDeActividades'] = listaActividades();
			renderizar2('listadoPack.html', $datos);
			
		}else{
			$datos['existeActividad']=true;
			renderizar2('altaPack.html',$datos);
		}
	}
	else
	{	
		$datos['listaDeActividades'] = listaActividades();
		renderizar2('altaPack.html',$datos);
	}
?>