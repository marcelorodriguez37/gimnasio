<?php
	require_once('../model/ABMPack.php');
	bajaPack($_GET['id']);
	header('Location: listadoPack.php')
?>