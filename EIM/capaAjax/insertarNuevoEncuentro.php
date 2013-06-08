<?php

if (isset($_POST)) {
    include (dirname(__FILE__) . '/../capaControladores/encuentro.php');
	include (dirname(__FILE__) . '/../capaControladores/desafios.php');
	
    $idJugadores = $_POST['idJugadores']; //not null
    $idJugadores1 = $_POST['idJugadores1'];
    $fecha = $_POST['fecha']; // not null
    $idCanchas = $_POST['idCanchas'];
    $idGanador = $_POST['idGanador']; //not null

    if (!empty($idJugadores) && !empty($idJugadores1) && !empty($fecha) && !empty($idCanchas) && !empty($idGanador)) {
        $insertado = Encuentro::insertarEncuentro($idJugadores, $idJugadores1, $fecha, $idCanchas, $idGanador);
		$actualizarEstado = Desafios::actualizarEstadoDesafio($idJugadores, $idJugadores1, "Concretado", $fecha);
		
        if ($insertado) {
		
            echo 1; // ok
        } else {
            echo 2; // ya existe
        }
    }else{
        echo 0; // faltan datos
    }
}
?>


