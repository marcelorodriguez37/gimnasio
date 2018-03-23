<?php
	session_start();
	require_once('configTwig.php');
	require_once('../model/ABMActividad.php');
	$datos["actividad"]=buscarActividad($_GET['id']);
	renderizar2('modificarActividad.html',$datos);
?>
