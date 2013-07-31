<?php

include_once(dirname(__FILE__) . '/../capaControladores/jugadores.php');
$categoria = $_POST['categoria'];
$errores = 0;
foreach ($_POST['rank'] as $ranking => $idUsuarios) {
    if ($idUsuarios > 0) {
        $actualizado = Jugadores::setRanking($idUsuarios, $ranking + 1);
        //echo "$categoria - ranking: ".($ranking+1)." - id: $idJugador <br>";
        if ($actualizado) {

        }// se actualizo correctamente el ranking del jugador
        else {
            $errores=$errores +1;
        }//si hubo errores
    }//si el usuario es usuario (id!=0)
}//foreach usuarios

if ($errores < 0) {
    echo 1; //todos ingresados!
} else {
    echo 0;//algun jugador arrojo error
}
?>
