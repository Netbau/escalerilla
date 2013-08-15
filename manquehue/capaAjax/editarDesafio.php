<?php
if(isset($_POST)){
    include_once (dirname(__FILE__) . '/../capaControladores/desafios.php');
    $idJugador = $_POST['id0'];
    $idJugador1 = $_POST['id1'];
    $fecha = $_POST['fecha'];
    $estado = $_POST['estado'];

    $actualizado = Desafios::actualizarEstadoDesafio($idJugador, $idJugador1, $estado, $fecha);
    if($actualizado){
        echo 1;
    }
    else{
        echo 0;
    }
}
else{
    echo 0;
}
?>
