<?php
	session_start();
	require_once('./configTwig.php');
	if (!empty($_POST["nombre"]) and !empty($_POST["apellido"]) and !empty($_POST["direccion"]) and 
		!empty($_POST["dni"]) and !empty($_POST["fechaNac"]) and !empty($_POST["telefono"]) )
	{
		$carpetaDestino="../imagenesClientes/";
		
		require_once('../model/ABMCliente.php');
		$nombre=$_POST["nombre"];
		$apellido=$_POST["apellido"];
		$direccion=$_POST["direccion"];
		$dni=$_POST["dni"];
		$fechaNac=$_POST["fechaNac"];
		$telefono=$_POST["telefono"];
		$fechaInscripcion = date("Y-m-d");
		$observaciones=$_POST["observaciones"];
		$imagen = $_FILES["archivo"]["name"][0];
		$i=0;
		if($_FILES["archivo"]["type"][$i]=="image/jpeg" || $_FILES["archivo"]["type"][$i]=="image/pjpeg" || $_FILES["archivo"]["type"][$i]=="image/gif" || $_FILES["archivo"]["type"][$i]=="image/png"){

			$origen=$_FILES["archivo"]["tmp_name"][0];
                    $destino=$carpetaDestino.$_FILES["archivo"]["name"][0];
 
                    # movemos el archivo
                    if(@move_uploaded_file($origen, $destino))
                    {
                        echo "<br>".$_FILES["archivo"]["name"][$i]." movido correctamente";
                    }else{
                        echo "<br>No se ha podido mover el archivo: ".$_FILES["archivo"]["name"][$i];
                    }
		}else{
			//error ese archivo es invalido, debe ser .jpg , .png o .gif
		}
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