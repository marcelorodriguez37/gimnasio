<?php
	session_start();
	require_once('./configTwig.php');
	if (!empty($_POST["nombre"]) and !empty($_POST["apellido"]) and !empty($_POST["direccion"]) and 
		!empty($_POST["dni"]) and !empty($_POST["fechaNac"]) and !empty($_POST["telefono"]) and !empty($_POST["observaciones"]) and !empty($_POST["imagen"]))
	{
		
		require_once('../model/ABMCliente.php');
		$nombre=$_POST["nombre"];
		$apellido=$_POST["apellido"];
		$direccion=$_POST["direccion"];
		$dni=$_POST["dni"];
		$fechaNac=$_POST["fechaNac"];
		$telefono=$_POST["telefono"];
		$fechaInscripcion = date("Y-m-d");
		$observaciones=$_POST["observaciones"];
		$imagen = $_POST["imagen"];
		$result = agregarCliente($nombre, $apellido, $direccion, $dni, $fechaNac, $telefono, $fechaInscripcion,$imagen, $observaciones);
		if($result){
			$datos['mensaje']='Se realizo el registro del paciente con exito';
			header('Location: listadoClientes.php');
		}else{
			$datos['mensaje']='No se pudo registrar al paciente';
			header('Location: altaCliente.php');
		}
	}
	else
	{
		renderizar2('altaCliente.html',array());	
	}	
	
?>