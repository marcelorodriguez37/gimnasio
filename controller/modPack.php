<?php
	session_start();
	require_once('./configTwig.php');
	/**if (!empty($_POST["nombre"]) and !empty($_POST["apellido"]) and !empty($_POST["direccion"]) and 
		!empty($_POST["dni"]) and !empty($_POST["fechaNac"]) and !empty($_POST["telefono"]) and !empty($_POST["observaciones"]))
	{**/
		
		require_once('../model/ABMActividad.php');
		require_once('../model/ABMPack.php');

		$id = $_POST["id"];
		$nombre=$_POST["nombre"];
		$precio=$_POST["precio"];
		$descripcion=$_POST["descripcion"];
		//$arregloDeActividades=$_POST["arregloDeActividades"];
		modificarPack($nombre, $precio, $descripcion, $id);
		$datos['listaDeActividades'] = listaActividades();
	$datos['listaDePromociones'] = listaPacks();
	renderizar2('listadoPack.html', $datos);
?>