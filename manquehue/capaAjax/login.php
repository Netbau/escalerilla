<?php

session_start();
require_once('../capaControladores/usuarios.php');
require_once('../capaControladores/jugadores.php');
if (isset($_POST['usuario']) && isset($_POST['password'])) {
    $rut = explode('-', $_POST['usuario']);
    $rut = $rut[0];
    $password = $_POST['password'];

    $login = usuarios::VerificarClave($rut, $password);
    if ($login) {
        $datos = usuarios::Datos($rut);
        if ($datos[0]['nombre'] != '') {
            $_SESSION['usuario'] = $datos[0];
            if ($jugador = Jugadores::Datos($rut)) {
                $_SESSION['jugador'] = $jugador[0];
            }
            echo '2'; //todo ok
        } else {
            echo '3'; // nose guardo la sesion
        }
    } else {
        echo '1'; //password no coincide
    }
} else {
    echo '0'; // no se ingreso usuario o password
}
?>
