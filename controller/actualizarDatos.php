<?php
	if(!empty($_POST["dni"])){
		require('../model/ABMIngresos.php');
		$dni=$_POST["dni"];
		$datos = actualizar($dni);
		echo json_encode($datos);
	}
	if(!empty($_POST["idPack"])){
		require('../model/ABMPack.php');
		$idP=$_POST["idPack"];
		$datos = montoPack($idP);
		echo json_encode($datos);
	}
?>