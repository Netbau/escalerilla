<?php
session_start();
require_once('../capaControladores/usuarios.php');
if (isset($_POST['usuario']) && isset($_POST['password'])) {
    $rut = explode('-', $_POST['usuario']);
    $rut = $rut[0];
    $password = $_POST['password'];

    $datos = usuarios::VerificarClave($rut, $password);
    if ($datos) {
        $_SESSION['usuario'] = $datos;
        echo '2';
    } else {
        echo '1';
    }
} else {
    echo '0'; // no se ingreso usuario o password
}
?>
