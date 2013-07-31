<?php
	session_start();
	require_once (dirname(__FILE__) . '/../capaControladores/noticias.php');
	//A PARTIR DEL SELECTOR INDICAMOS QUE ACCION EJECUTAMOS
	if($_GET['tipo'] == 'add')
?>