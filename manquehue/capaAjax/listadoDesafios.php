<?php

include_once(dirname(__FILE__) . '/../capaControladores/desafios.php');
include_once(dirname(__FILE__) . '/../capaControladores/jugadores.php');

$Desafios = Desafios::getDesafiosPorEstado('Pendiente');


if (isset($_POST['formato'])) {
    /*
     * FORMATOS:
     * - JSON -> json_encode
     * - option -> <option></option>
     * - lista -> <lista></lista>
     */
    $formato = $_POST['formato'];
} else {
    $formato = 'option';
}
if ($formato == 'option') {

    foreach ($Desafios as $Desafio) {

        $nombre1 = Jugadores::getNombrePorID($Desafio['idJugadores']);
        $nombre2 = Jugadores::getNombrePorID($Desafio['idJugadores1']);
        $fecha = explode(' ', $Desafio['fecha']);
        echo "
            <option fecha='".$fecha[0]."' value='" . $Desafio['idJugadores'] . "-" . $Desafio['idJugadores1'] . "'>" . $nombre1[0]['nombre'] . " " . $nombre1[0]['apellido'] .
        ' v/s ' . $nombre2[0]['nombre'] . " " . $nombre2[0]['apellido'] . "</option>";
    }
} elseif ($formato == 'json') {
    echo json_encode($Jugadores);
}
?>
