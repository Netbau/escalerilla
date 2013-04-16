<?php

session_start();
require_once('../capaControladores/usuarios.php');
if (isset($_POST['usuario']) && isset($_POST['password'])) {
    $rut = explode('-', $_POST['usuario']);
    $rut = $rut[0];
    $password = $_POST['password'];

    $login = usuarios::VerificarClave($rut, $password);
    if ($login) {
        $datos = usuarios::Datos($rut);
        if ($datos) {
            $_SESSION['usuario'] = $datos;
            echo '2'; //todo ok
        } else {
            echo '3';
        }
    } else {
        echo '1'; //password no coincide
    }
} else {
    echo '0'; // no se ingreso usuario o password
}
?>
