<?php

/*
 * Funcion que transforma el id de un jugador en un nombre+apellido 
 * dentro del arreglo, reemplaza estos datos y devuelve el listado
 */

function transformaDesafios($desafios) {
    include_once(dirname(__FILE__) . '/../capaControladores/desafios.php');
    include_once(dirname(__FILE__) . '/../capaControladores/jugadores.php');
    $desafios2 = array();

    foreach ($desafios as $desafio) {
        $desafiador = Jugadores::getNombrePorID($desafio['idJugadores']);
        $desafiado = Jugadores::getNombrePorID($desafio['idJugadores1']);
        $desafio['idJugadores'] = $desafiador[0]['nombre'] . ' ' . $desafiador[0]['apellido'];
        $desafio['idJugadores1'] = $desafiado[0]['nombre'] . ' ' . $desafiado[0]['apellido'];

        $desafios2[] = $desafio;
    }
    return $desafios2;
}

?>
