<?php
	require_once('./configTwig.php');
	require_once('../model/ABMActividad.php');
	$datos['listaDeActividades'] = listaActividades();
	renderizar2('listadoActividades.html', $datos);
?>