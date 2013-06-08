<?php
	session_start();
	//A PARTIR DE LOS DATOS ENVIADOS GENERAMOS EL CORREO.
	$para      = 'nadie@example.com'; //AKA VA EL CORREO AL QUE LLEGARA EL MAIL
	$asunto    = $_POST['consulta'].' de : '. $_POST['name'];
	$mensaje   = $_POST['message'];
	$cabeceras = 'From: '.$_POST['mail']. "\r\n" .
	    'Reply-To: '.$_POST['mail']. "\r\n"; //CORREO DE RESPUESTA
	if(@mail($para, $asunto, $mensaje, $cabeceras))
	{
		$retorno = new stdClass();
		$retorno->status = true;
		echo json_encode($retorno);
	}
	else
	{
		$retorno = new stdClass();
		$retorno->status = false;
		echo json_encode($retorno);
	}
?>