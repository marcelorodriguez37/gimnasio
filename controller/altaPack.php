<?php
	session_start();
	require_once('./configTwig.php');
	require_once('../model/ABMActividad.php');

	if ((!empty($_POST["nombre"])) and (!empty($_POST["arregloDeActividades"])) and !empty($_POST["precio"])) {
		
		require_once('../model/ABMPack.php');
		$nombre=$_POST["nombre"];
		if(!existePack($nombre)){
			$arregloActividades = $_POST["arregloDeActividades"];
			$precio = $_POST["precio"];
			if (!empty($_POST["descripcion"])) {
				$descripcion = $_POST["descripcion"];
			}else{
				$descripcion = 1;
			}
			$result=agregarPack($nombre,$arregloActividades,$precio,$descripcion);
			if($result){
				$datos['mensaje']= "Se registro la promoción con exito";
				header('Location: listadoPack.php');
			}else{
				$datos['mensaje'] = "Error al registrar la promoción.";
				renderizar2('altaPack.html',$datos);
			}
			
			
		}else{
			$datos['mensaje']="Existe una promo con el mismo nombre";
			renderizar2('altaPack.html',$datos);
		}
	}
	else
	{	
		$datos['listaDeActividades'] = listaActividades();
		renderizar2('altaPack.html',$datos);
	}
?>