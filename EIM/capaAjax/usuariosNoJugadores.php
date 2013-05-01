<?php

include_once(dirname(__FILE__) . '/../capaControladores/usuarios.php');
$noJugadores = Usuarios::getNotJugadores();
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
    foreach ($noJugadores as $noJugador) {
        echo "
            <option value='" . $noJugador['idUsuarios'] . "'>" . $noJugador['nombre'] . ' ' . $noJugador['apellido'] . "</option>";
    }
} elseif ($formato == 'json') {
    echo json_encode($noJugadores);
}
?>
