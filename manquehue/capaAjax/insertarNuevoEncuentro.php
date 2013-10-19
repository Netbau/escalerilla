<?php

if (isset($_POST)) {
    include (dirname(__FILE__) . '/../capaControladores/encuentro.php');
    include (dirname(__FILE__) . '/../capaControladores/desafios.php');

    $idJugadores = $_POST['idJugadores']; //not null
    $idJugadores1 = $_POST['idJugadores1'];
    $fecha = $_POST['fecha']; // not null
    $idCanchas = $_POST['idCanchas'];
    $idGanador = $_POST['idGanador']; //not null
    $set_info = json_decode(stripslashes($_POST['sets']));

    if (!empty($idJugadores) && !empty($idJugadores1) && !empty($fecha) && !empty($idCanchas) && !empty($idGanador)) {
        $actualizarEstado = Desafios::actualizarEstadoDesafio($idJugadores, $idJugadores1, "Concretado", $fecha);
        if ($actualizarEstado->status == 1) {
            $insertado = Encuentro::insertarEncuentro($idJugadores, $idJugadores1, $fecha, $idCanchas, $idGanador);
            if ($insertado->status == 1) {
                foreach ($set_info as $key => $resultado) {
                    Encuentro::insertarResultadoEncuentro(($key + 1), $insertado->value['idEncuentro'], $resultado);
                }
                $retorno = new stdClass();
                $retorno->output = 1;
                echo json_encode($retorno);
            } elseif ($insertado->status == 2) {
                $retorno = new stdClass();
                $retorno->output = 2;
                echo json_encode($retorno);
            } elseif ($insertado->status == 0) {
                $retorno = new stdClass();
                $retorno->output = 3;
                echo json_encode($retorno);
            }
        }//se inserta el encuentro luego de actualizar a concretado el estado del desafio
        else {
            $retorno = new stdClass();
            $retorno->output = 0;
            echo json_encode($retorno);
        }// se retorna 0 si no se modifico el estado del desafio
    } else {
        $retorno = new stdClass();
        $retorno->output = 0;
        echo json_encode($retorno);
    }// se retorna 0 si hay algun dato vacio
}
?>