<?php
	require_once('configTwig.php');
	require_once('../model/ABMPack.php');
	require_once('../model/ABMActividad.php');
	$datos["pack"]=buscarPack($_GET['id']);
	$datos["actividadesPack"]=buscarActividadesDelPack($_GET['id']);
	
	//$datos['listaDeActividades'] = listaActividades();

	renderizar2('verPack.html',$datos);
?>
