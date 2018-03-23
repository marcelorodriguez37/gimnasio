<?php
	session_start();
	require_once('./configTwig.php');
	/**if (!empty($_POST["nombre"]) and !empty($_POST["apellido"]) and !empty($_POST["direccion"]) and 
		!empty($_POST["dni"]) and !empty($_POST["fechaNac"]) and !empty($_POST["telefono"]) and !empty($_POST["observaciones"]))
	{**/
		
		require_once('../model/ABMCliente.php');

		$id = $_POST["id"];
		$nombre=$_POST["nombre"];
		$apellido=$_POST["apellido"];
		$direccion=$_POST["direccion"];
		$dni=$_POST["dni"];
		$fechaNac=$_POST["fechaNac"];
		$telefono=$_POST["telefono"];
		$fechaInscripcion = date("Y-m-d");
		$observaciones=$_POST["observaciones"];
		
		//$datos['exito']='exito';
		$carpetaDestino="../imagenesClientes/";
		
		$i=0;
		if($_FILES["archivo"]["type"][$i]=="image/jpeg" || $_FILES["archivo"]["type"][$i]=="image/pjpeg" || $_FILES["archivo"]["type"][$i]=="image/gif" || $_FILES["archivo"]["type"][$i]=="image/png"){
			$_FILES["archivo"]["name"][0] = $id+'.jpg';
			$origen=$_FILES["archivo"]["tmp_name"][0];
                    $destino=$carpetaDestino.$_FILES["archivo"]["name"][0];
 
                    # movemos el archivo
                    if(@move_uploaded_file($origen, $destino))
                    {
                       echo "";
                    }else{
                        echo "<br>No se ha podido guardar el archivo: ".$_FILES["archivo"]["name"][$i];
                    }
		}else{
			//error ese archivo es invalido, debe ser .jpg , .png o .gif
		}
		modificarCliente($nombre, $apellido, $direccion, $dni, $fechaNac, $telefono, $fechaInscripcion, $observaciones,$id);
		$datos['listaDeClientes'] = listaClientes();
		renderizar2('listadoClientes.html',$datos);
	/**}
	else
	{
		renderizar2('altaCliente.html',array());	
	}	**/

?>
