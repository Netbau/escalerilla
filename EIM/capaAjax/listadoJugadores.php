<?php

include_once(dirname(__FILE__) . '/../capaControladores/jugadores.php');
$Jugadores = Jugadores::Crude();

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

    foreach ($Jugadores as $Jugador) {
	

        echo "
            <option value='" . $Jugador['idJugadores'] . "'>" . $Jugador['nombre'] . ' ' . $Jugador	['apellido'] . "</option>";
    }
} elseif ($formato == 'json') {
    echo json_encode($Jugadores);
}
?>
