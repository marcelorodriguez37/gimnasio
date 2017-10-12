<?php
	session_start();
	require_once('./configTwig.php');
	if (!empty($_POST["nombre"]) and !empty($_POST["apellido"]) and !empty($_POST["direccion"]) and 
		!empty($_POST["dni"]) and !empty($_POST["fechaNac"]) and !empty($_POST["telefono"]) and 
		!empty($_POST["fechaInscripcion"]) and !empty($_POST["observaciones"]))
	{
		require_once('../model/ABMCliente.php');
		$nombre=$_POST["nombre"];
		$apellido=$_POST["apellido"];
		$direccion=$_POST["direccion"];
		$dni=$_POST["dni"];
		$fechaNac=$_POST["fechaNac"];
		$telefono=$_POST["telefono"];
		$fechaInscripcion = $_POST["fechaInscripcion"];
		$observaciones=$_POST["observaciones"];
		agregarCliente($nombre, $apellido, $direccion, $dni, $fechaNac, $telefono, $fechaInscripcion, $observaciones);
		$datos['exito']='exito';
		renderizar2('altaCliente.html',$datos);
	}
	else
	{
		renderizar2('altaCliente.html',array());	
	}	
	
?>