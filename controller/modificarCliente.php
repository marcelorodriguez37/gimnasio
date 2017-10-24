<?php
	require_once('configTwig.php');
	require_once('../model/ABMCliente.php');
	$datos["cliente"]=buscarCliente($_GET['id']);
	
	renderizar2('modificarCliente.html',$datos);
?>
