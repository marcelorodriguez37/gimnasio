<?php
	require_once('../model/ABMActividad.php');
	bajaActividad($_GET['id']);
	header('Location: listadoActividad.php')
?>