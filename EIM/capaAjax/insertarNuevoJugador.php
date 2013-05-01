<?php

if (isset($_POST['idUsuarios']) && isset($_POST['categoria'])) {
    include_once(dirname(__FILE__) . '/../capaControladores/jugadores.php');
    $idUsuarios = $_POST['idUsuarios'];
    $categoria = $_POST['categoria'];

    $ranking = Jugadores::getUltimoRanking($categoria);
    if (!empty($ranking)) {
        $ranking = $ranking[0]['ranking'] + 1;
    }
    else{
        $ranking = 1;
    }

    $insertado = Jugadores::Insertar($ranking, $categoria, $idUsuarios);
    if($insertado){
        echo 1; //todo ok
    }
    else{
        echo 0;// no se inserto el jugador
    }
}
?>
