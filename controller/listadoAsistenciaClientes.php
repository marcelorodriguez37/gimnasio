<?php
	require_once('./configTwig.php');
	require_once('../model/ABMAsistencia.php');
	$datos['listaDeAsistencia'] = listaDeAsistencia();
	renderizar2('listadoAsistenciaPorCliente.html', $datos);
?>