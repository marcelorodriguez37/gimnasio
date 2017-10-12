<?php
	require_once('./configTwig.php');
	require_once('../model/ABMCliente.php');
	$datos['listaDeClientes'] = listaClientes();
	renderizar2('listadoClientes.html', $datos);
?>