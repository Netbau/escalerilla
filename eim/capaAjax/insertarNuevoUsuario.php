<?php

if (isset($_POST)) {
    include (dirname(__FILE__) . '/../capaControladores/usuarios.php');
    $rut = explode('-', $_POST['rut']); //not null
    $nombre = $_POST['nombre']; //not null
    $segundoNombre = $_POST['segundoNombre'];
    $apellido = $_POST['apellido']; // not null
    $segundoApellido = $_POST['segundoApellido'];
    $fechaNacimiento = $_POST['fechaNacimiento']; //not null
    $sexo = $_POST['sexo']; //not null
    $telefono = $_POST['telefono']; //not null
    $telefono2 = $_POST['telefono2'];
    $correo = $_POST['correo']; // not null
    if (!empty($rut) && !empty($nombre) && !empty($apellido) && !empty($fechaNacimiento) && !empty($sexo) && !empty($telefono) && !empty($correo)) {
        $insertado = Usuarios::Insertar($rut[0], $nombre, $apellido, $correo, $telefono, $fechaNacimiento, $sexo, $segundoNombre, $segundoApellido, $telefono2);
        if ($insertado) {
            echo 1; // ok
        } else {
            echo 2; // ya existe
        }
    }else{
        echo 0; // faltan datos
    }
}
?>
