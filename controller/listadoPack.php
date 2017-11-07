<?php
	require_once('./configTwig.php');
	require_once('../model/ABMPack.php');
	require_once('../model/ABMActividad.php');

	$datos['listaDeActividades'] = listaActividades();
	$datos['listaDePromociones'] = listaPacks();
	renderizar2('listadoPack.html', $datos);
?>