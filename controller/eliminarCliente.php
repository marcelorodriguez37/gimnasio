<?php
	require_once('../model/ABMCliente.php');
	bajaCliente($_GET['id']);
	header('Location: listadoClientes.php')
?>