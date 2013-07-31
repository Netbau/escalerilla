<?php
	session_start();
	require_once (dirname(__FILE__) . '/../capaControladores/noticias.php');
	//A PARTIR DEL SELECTOR INDICAMOS QUE ACCION EJECUTAMOS
	if($_POST['tipo'] == 'add')
	{
		//LLAMAMOS A LA CONSULTA
		$salida = Noticia::insertarNoticia(date('Y-m-d h:i:s'),$_POST['titulo'],$_POST['contenido'],1);
		//CREAMOS LA MATRIZ DE RETORNO CON STATUS Y LA DEVOLVEMOS
		$retorno = new stdClass();
		$retorno->success = $salida;
		echo json_encode($retorno);

	}
	elseif($_POST['tipo'] == 'getEdit')
	{
		//LLAMAMOS A LA CONSULTA
		$salida = Noticia::getReg($_POST['id']);
		//DEVOLVEMOS STRING JSON CON LA INFORMACION
		echo json_encode($salida[0]);
	}
	elseif($_POST['tipo'] == 'mod')
	{
		//LLAMAMOS A LA CONSULTA
		$salida = Noticia::updateNoticia(date('Y-m-d h:i:s'),$_POST['titulo'],$_POST['contenido'],$_POST['status'],$_POST['id']);
		//CREAMOS LA MATRIZ DE RETORNO CON STATUS Y LA DEVOLVEMOS
		$retorno = new stdClass();
		$retorno->success = $salida;
		echo json_encode($retorno);
	}
?>